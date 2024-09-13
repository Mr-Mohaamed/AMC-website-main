<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\DashBoardTrait2;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    use DashBoardTrait2;

    public function index(Request $request)
    {
        $data = Post::with('sections')->get();
        return $data;
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'img' => 'required',
        ]);


        $data = new Post();

        if ($request->hasFile('img')) {
            $img = $request->hasFile('img') ? $this->store_img($request->file('img'), 'Web') : null;
            $data->img = $img;
        }

        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
        $data->save();
        return 200;
    }

    public function show(string $id)
    {
        $data = Post::with('sections')->find($id);
        return $data;
    }

    public function update(Request $request, string $id)
    {
        $data = Post::find($id);
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'img' => 'required'
        ]);

        if ($request->hasFile('img')) {
            $img = $request->hasFile('img') ? $this->store_img($request->file('img'), 'Web') : null;
            $data->img = $img;
        }

        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
        $data->save();
        return 200;
    }

    public function destroy(string $id)
    {
        Post::where('id', $id)->delete();
        return 200;
    }
}
