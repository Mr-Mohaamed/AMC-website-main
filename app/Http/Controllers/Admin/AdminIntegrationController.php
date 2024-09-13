<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Integration;
use App\Traits\DashBoardTrait;
use Illuminate\Http\Request;

class AdminIntegrationController extends Controller
{
    use DashBoardTrait;
    public function view()
    {
        return view('admin.Integrations.Integrations');
    }

    public function index()
    {
        $data = Integration::all();
        return  $data;
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_en'        => 'required|max:255',
            'name_ar'       => 'required|max:255',
        ]);
        $img = $request->hasFile('img') ? $this->store_img($request->file('img') , 'Tech' ) : null;
        Integration::insert([
            'name_en'         => $request->name_en ,
            'name_ar'          => $request->name_ar ,
            'img'          => $img,
        ]);
        return 200;
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Integration::find($id);
        return  $data;
    }

    public function update(Request $request, string $id)
    {
        $data = Integration::find($id);
        $request->validate([
            'name_en'        => 'required|max:255',
            'name_ar'       => 'required|max:255',
        ]);
        if($request->hasFile('img'))
        {
            $this->delete_img($data->img);
            $img = $request->hasFile('img') ? $this->store_img($request->file('img') , 'Tech' ) : null;
            $data->img      = $img;
        }
        $data->name_en  = $request->name_en ;
        $data->name_ar  = $request->name_ar ;
        $data->save();
        return 200;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Integration::find($id);
        if($data->img)
        {
            $this->delete_img($data->img);
        }
        $data->delete();
        return 200;
    }
}
