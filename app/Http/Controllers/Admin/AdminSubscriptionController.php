<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class AdminSubscriptionController extends Controller
{

    public function view()
    {
        return view('Admin.Subscription.subscription');
    }

    public function Product_view()
    {
        return view('Admin.Products.Product');
    }

    public function index(Request $request)
    {
        $type = $request->type;
        $data = Subscription::where('type', $type)->orderBy('sort', 'desc')->with('details')->get();
        return $data;
    }

    public function change_sort(Request $request)
    {
        $type = $request->type;
        $item_old = Subscription::where('type', $type)->where('sort', $request->old)->first();
        $item_new = Subscription::where('type', $type)->where('sort', $request->new)->first();

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
            'id' => 'required|exists:subscriptions,id'
        ]);
        $item = Subscription::find($request->id);
        if ($request->type == 'most_popular') {
            $item->most_popular = $request->input('status') === 'on' ? 1 : 0;
        }
        $item->update();
        return response()->json([
            'status' => 200,
            'message' => trans('message.update'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'header_en' => 'required|string',
            'header_ar' => 'required|string',
            'price' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^\d+$/', $value) && !in_array($value, ['Free', 'Custom'])) {
                        $fail($attribute . ' must be a number, "Free", or "Custom".');
                    }
                },
            ],
            'discount' => 'nullable|string',
        ]);
        $item_sort = Subscription::where('type', $request->type)->orderBy('sort', 'desc')->first();

        $data = new Subscription();
        $data->type = $request->type;
        $data->sort = $item_sort ? $item_sort->sort + 1 : 1;
        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
        $data->header_en = $request->header_en;
        $data->header_ar = $request->header_ar;
        $data->des_en = $request->des_en;
        $data->des_ar = $request->des_ar;
        $data->price = $request->price;
        $data->discount = $request->discount;
        $data->save();
        return 200;
    }

    public function show(string $id)
    {
        $data = Subscription::with('details')->find($id);
        return $data;
    }

    public function update(Request $request, string $id)
    {
        $data = Subscription::find($id);
        $request->validate([
            'type' => 'required|string',
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'header_en' => 'required|string',
            'header_ar' => 'required|string',
            'price' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^\d+$/', $value) && !in_array($value, ['Free', 'Custom'])) {
                        $fail($attribute . ' must be a number, "Free", or "Custom".');
                    }
                },
            ],
            'discount' => 'nullable|string',
        ]);
        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
        $data->price = $request->price;
        $data->des_en = $request->des_en;
        $data->des_ar = $request->des_ar;
        $data->name_ar = $request->name_ar;
        $data->header_en = $request->header_en;
        $data->header_ar = $request->header_ar;
        $data->discount = $request->discount;
        $data->save();
        return 200;
    }

    public function destroy(string $id)
    {
        Subscription::where('id', $id)->delete();
        return 200;
    }
}
