<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminUsersController extends Controller
{

    public function view()
    {
        return view('Admin.Users.AdminUsers');
    }

    public function index(Request $request)
    {
        $id = $request->user()->id;
        $data = User::where('id','not Like' ,$id)->get();
        return $data;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'type' => 'required',
            'password' => ['required', 'confirmed', Password::defaults()],

        ]);
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->type =$request->input('type');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return response()->json([
            'status'=>200,
            'message' =>'Create Successflly',
        ]);
    }


    public function show(string $id)
    {
        $data =User::find($id);
        return $data;
    }

    public function update(Request $request, string $id)
    {
        $data =User::find($id);
        if(!$data)
        {
            return response()->json([
                'status' => 423,
                'message' => 'User Not Found !!'
            ]);
        }
        $data->name = $request->input('name');
        $data->type =$request->input('type');
        if($request->password)
        {
            $data->password = Hash::make($request->input('password'));
        }
        $data->save();
        return response()->json([
            'status'=>200,
            'message' =>'Create Successflly',
        ]);
    }


    public function destroy(string $id)
    {
        $data =User::find($id);
        if(!$data)
        {
            return response()->json([
                'status' => 500,
                'message' => 'User Not Found !!'
            ]);
        }
        $data->delete();
        return response()->json([
            'status' => 423,
            'item' => $data
        ]);
    }
}
