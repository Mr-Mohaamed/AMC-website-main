<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'des_en' => 'required',
            'des_ar' => 'required',
            'type' => 'required',
        ]);
        $data = new About();
        $data->des_en = $request->des_en;
        $data->des_ar = $request->des_ar;
        $data->type = $request->type;
        if ($request->type == 'subscription') {
            $data->subscription_id = $request->item_id;
        } else if ($request->type == 'item') {
            $data->item_id = $request->item_id;
        }
        $data->save();
        return [
            'id' => $request->item_id,
            'status' => 200,
        ];
    }

    public function show(string $id)
    {
        $data = About::find($id);
        return $data;
    }

    public function update(Request $request, string $id)
    {
        $data = About::find($id);
        $request->validate([
            'des_en' => 'required',
            'des_ar' => 'required',
        ]);
        $data->des_en = $request->des_en;
        $data->des_ar = $request->des_ar;
        $data->save();
        return [
            'id' => $data->subscription_id,
            'status' => 200,
        ];
    }

    public function destroy(string $id)
    {
        $data = About::find($id);
        if ($data->type == 'subscription') {
            $id = $data->subscription_id;
        } else {
            $id = $data->item_id;
        }
        $data->delete();
        return [
            'id' => $id,
        ];
    }
}
