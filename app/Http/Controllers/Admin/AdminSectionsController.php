<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Traits\DashBoardTrait2;

use Illuminate\Http\Request;

class AdminSectionsController extends Controller
{
    use DashBoardTrait2;


    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'des_en' => 'required',
            'des_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            // 'img' => 'required'
        ]);
        $data = new Section();

        if ($request->hasFile('img')) {
            $img = $request->hasFile('img') ? $this->store_img($request->file('img'), 'Web') : null;
            $data->img = $img;
        }

        $data->des_en = $request->des_en;
        $data->des_ar = $request->des_ar;
        $data->content_en = $request->content_en;
        $data->content_ar = $request->content_ar;
        $data->post_id = $request->item_id;
        $data->save();
        return [
            'id' => $request->item_id,
            'status' => 200,
        ];
    }

    public function show(string $id)
    {
        $data = Section::find($id);
        return $data;
    }

    public function update(Request $request, string $id)
    {
        $data = Section::find($id);
        $request->validate([
            'des_en' => 'required',
            'des_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            // 'img' => 'required'
        ]);

        if ($request->hasFile('img')) {
            $img = $request->hasFile('img') ? $this->store_img($request->file('img'), 'Web') : null;
            $data->img = $img;
        }

        $data->des_en = $request->des_en;
        $data->des_ar = $request->des_ar;
        $data->content_en = $request->content_en;
        $data->content_ar = $request->content_ar;
        $data->save();
        return [
            'id' => $data->subscription_id,
            'status' => 200,
        ];
    }

    public function destroy(string $id)
    {
        $data = Section::find($id);
        $id = $data->post_id;
        $data->delete();
        return [
            'id' => $id,
        ];
    }
}
