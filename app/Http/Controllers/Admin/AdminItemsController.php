<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Image;
use App\Models\Item;
use App\Models\ItemTech;
use App\Models\Tech;
use App\Traits\DashBoardTrait2;
use Illuminate\Http\Request;

class AdminItemsController extends Controller
{
    use DashBoardTrait2;


    public function view_all_items()
    {
        return view('Admin.Items.items');
    }

    public function change_sort(Request $request)
    {
        $item_old = Item::where('sort', $request->old)->first();
        $item_new = Item::where('sort', $request->new)->first();
        if (!$item_old || !$item_new) {
            return response()->json([
                'status' => 500,
                'message' => 'item not found',
            ]);
        }
        $item_old->sort = $request->new;
        $item_old->save();

        $item_new->sort = $request->old;
        $item_new->save();
        return response()->json([
            'status' => 200,
            'message' => trans('message.update'),
        ]);
    }

    function change_Status(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:items,id'
        ]);
        $item = Item::find($request->id);
        if ($request->type == 'most_popular') {
            $item->most_popular = $request->input('status') === 'on' ? 1 : 0;
        }
        $item->update();
        return response()->json([
            'status' => 200,
            'message' => trans('message.update'),
        ]);
    }

    public function get_all_items()
    {
        $data = Item::orderBy('id', 'desc')->get();
        return $data;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'des_en' => 'nullable|max:255',
            'des_ar' => 'nullable|max:255',
            'price' => 'required|max:255',
        ]);
        $img = $request->hasFile('img') ? $this->store_img($request->file('img'), 'Items') : null;
        $item_sort = Item::orderBy('sort', 'desc')->first();

        $Item = new Item();
        $Item->sort = $item_sort ? $item_sort->sort + 1 : 1;
        $Item->img = $img;
        $Item->name_en = $request->name_en;
        $Item->name_ar = $request->name_ar;
        $Item->price = $request->price;
        $Item->des_en = $request->des_en;
        $Item->des_ar = $request->des_ar;
        $Item->save();



        return 200;
    }

    public function show(string $id)
    {
        $data = Item::with('details')->find($id);
        $item_technologies = $data->technologies->pluck('id')->toArray();
        $technologies = Tech::orderBy('id', 'desc')->get();
        return [
            'data' => $data,
            'item_technologies' => $item_technologies,
            'technologies' => $technologies
        ];
    }
    function items_technologies(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
        ]);

        $Item = Item::find($request->item_id);
        $Item->technologies()->detach();
        foreach ($request->ids as $id) {
            $data = new ItemTech();
            $data->tech_id = $id;
            $data->item_id = $Item->id;
            $data->save();
        }
        return 200;
    }
    public function update(Request $request, string $id)
    {
        $Item = Item::find($id);

        $request->validate([
            'name_en' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'price' => 'required|max:255',
        ]);
        $Item->name_en = $request->name_en;
        $Item->name_ar = $request->name_ar;
        $Item->des_en = $request->des_en;
        $Item->price = $request->price;
        $Item->des_ar = $request->des_ar;
        if ($request->hasFile('img')) {
            $this->delete_img($Item->img);
            $img = $request->hasFile('img') ? $this->store_img($request->file('img'), 'Items') : null;
            $Item->img = $img;
        }

        $Item->save();
        return 200;
    }

    public function destroy(string $id)
    {
        $data = Item::with('images')->find($id);
        foreach ($data->images as $item) {
            if ($item) {
                $this->delete_img($item->img);
            }
        }

        $data->delete();
        return 200;
    }

    public function get_Item_details_data($id)
    {

        $data = Item::where('id', $id)->first();
        $imgs = Image::where('item_id', $id)->get();
        if ($data) {
            return response()->json([
                'status' => 200,
                'item' => $data,
                'imgs' => $imgs,
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Item Not Found !!'
            ]);
        }
    }

    public function item_Item_add_Images(Request $request)
    {
        if ($request->hasfile('file')) {
            $item = Item::find($request->item_id);
            if ($request->hasfile('file')) {
                $img = $request->hasFile('file') ? $this->store_img($request->file('file'), 'Items') : null;
                $data = new Image();
                $data->img = $img;
                $data->item_id = $item->id;
                $data->save();
                if ($item->img == '') {
                    $item->img = $img;
                    $item->save();
                }
                return response()->json(['success' => $img, 'item_id' => $item->id]);
            }
        }

        return response()->json([
            'status' => 200,
            'item_id' => $request->item_id,
            'message' => 'Item Updated '
        ]);
    }

    public function get_images_details_data($id)
    {
        $img = Image::where('id', $id)->first();
        $item_id = Item::where('id', $img->item_id)->first();
        if ($img) {
            return response()->json([
                'status' => 200,
                'img' => $img,
                'item_id' => $item_id,

            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Item Not Found !!'
            ]);
        }
    }

    public function images_delete($id)
    {
        $data = Image::find($id);
        $item = Item::where('id', $data->item_id)->first();
        if ($data) {
            if ($item->img == $data->img) {
                $sapr = Image::where('item_id', $item->id)->where('id', 'not Like', $id)->first();
                if ($sapr) {
                    $item->img = $sapr->img;
                } else {
                    $item->img = '';
                }
                $item->save();
            }
            $this->delete_img($data->img);
            $data->delete();
            return response()->json([
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Item Not Found !!'
            ]);
        }
    }

    public function item_image_select($id)
    {
        $data = Image::find($id);
        $item = Item::where('id', $data->item_id)->first();
        $item->img = $data->img;
        $item->update();
        return response()->json([
            'status' => 200,
            'item' => $item,
        ]);

    }
}
