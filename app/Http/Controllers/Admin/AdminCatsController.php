<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Traits\DashBoardTrait2;
use Illuminate\Http\Request;

class AdminCatsController extends Controller
{
    use DashBoardTrait2 ;

    public function view()
    {
        return view('Admin.Cats.CatHome');
    }

    public function index()
    {
       $data = Cat::all();
       return  $data;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en'        => 'required|max:255',
            'name_ar'       => 'required|max:255',
            'des_en'        => 'nullable|max:255',
            'des_ar'        => 'nullable|max:255',
        ]);
        $img = $request->hasFile('img') ? $this->store_img($request->file('img') , 'Cats' ) : null;
        Cat::insert([
            'name_en'         => $request->name_en ,
            'name_ar'          => $request->name_ar ,
            'des_en'      => $request->des_en ,
            'des_ar'      => $request->des_ar ,
            'img'          => $img,
        ]);
        return 200;
    }


    public function show(string $id)
    {
        $data = Cat::find($id);
        return  $data;
    }


    public function update(Request $request, string $id)
    {
        $data = Cat::find($id);
        $request->validate([
            'name_en'        => 'required|max:255',
            'name_ar'       => 'required|max:255',
            'des_en'        => 'nullable|max:255',
            'des_ar'        => 'nullable|max:255',
        ]);
        if($request->hasFile('img'))
        {
            $this->delete_img($data->img);
            $img = $request->hasFile('img') ? $this->store_img($request->file('img') , 'Cats' ) : null;
            $data->img      = $img;
        }
        $data->name_en  = $request->name_en ;
        $data->name_ar  = $request->name_ar ;
        $data->des_en   = $request->des_en ;
        $data->des_ar   = $request->des_ar ;
        $data->save();
        return 200;
    }

    public function destroy(string $id)
    {
        $data = Cat::find($id);
        if($data->img)
        {
            $this->delete_img($data->img);
        }
        $data->delete();
        return 200;
    }
}