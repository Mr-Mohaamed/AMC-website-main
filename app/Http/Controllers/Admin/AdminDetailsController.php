<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Traits\DashBoardTrait2;
use Illuminate\Http\Request;

class AdminDetailsController extends Controller
{
    use DashBoardTrait2;

    public function view_home()
    {
        return view('Admin.WebDetails.WebDetails');
    }

    public function Home_Sctions()
    {
        return view('Admin.WebDetails.HomeSections');
    }

    public function Banners()
    {
        return view('Admin.WebDetails.Banners');
    }

    public function blog()
    {
        return view('Admin.WebDetails.Blog');
    }

    public function blogPosts()
    {
        return view('Admin.WebDetails.Posts');
    }

    public function services()
    {
        return view('Admin.WebDetails.Services');
    }

    public function Partners()
    {
        return view('Admin.WebDetails.Partners');
    }

    public function get_banners()
    {
        $types = ['banner1', 'banner2', 'banner3', 'about_header', 'mission', 'contact_header', 'who_we_serve', 'pricing_header', 'support_plan', 'product_plan'];
        $data = Detail::whereIn('type', $types)->orderBy('id', 'desc')->get();
        return $data;
    }

    public function get_blog()
    {
        $types = ['blog_header', 'blog_recent'];
        $data = Detail::whereIn('type', $types)->orderBy('id', 'desc')->get();
        return $data;
    }

    public function index(Request $request)
    {
        $query = $request->type;
        $data = null;
        if ($query == 'web') {
            $data = Detail::where('type', $query)->first();
        } else {
            $data = Detail::where('type', $query)->get();
        }
        return $data;
    }

    public function store(Request $request)
    {
        $data = null;
        if ($request->type == 'web') {
            $data = Detail::where('type', $request->type)->first();
            if (!$data) {
                $data = new Detail();
                if ($request->hasFile('img')) {
                    $img = $request->hasFile('img') ? $this->store_img($request->file('img'), 'Web') : null;
                    $data->img = $img;
                }
            }
            if ($request->hasFile('img')) {
                $this->delete_img($data->img);
                $img = $request->hasFile('img') ? $this->store_img($request->file('img'), 'Web') : null;
                $data->img = $img;
            }
            if ($request->hasFile('img2')) {
                $img2 = $request->hasFile('img2') ? $this->store_img($request->file('img2'), 'Web') : null;
                $data->img2 = $img2;
            }
            if ($request->hasFile('img3')) {
                $img3 = $request->hasFile('img3') ? $this->store_img($request->file('img3'), 'Web') : null;
                $data->img3 = $img3;
            }

            $data->type = $request->type;
            $data->name_en = $request->name_en;
            $data->phone1 = $request->phone1;
            $data->phone2 = $request->phone2;
            $data->address = $request->address;
            $data->email = $request->email;
            $data->whatsapp = $request->whatsapp;
            $data->facebook = $request->facebook;
            $data->youtube = $request->youtube;
            $data->instagram = $request->instagram;
            $data->linked_in = $request->linked_in;
            $data->save();
        } else {
            $data = new Detail();
            if ($request->hasFile('img')) {
                $img = $request->hasFile('img') ? $this->store_img($request->file('img'), 'Web') : null;
                $data->img = $img;
            }
            if ($request->hasFile('img2')) {
                $img2 = $request->hasFile('img2') ? $this->store_img($request->file('img2'), 'Web') : null;
                $data->img2 = $img2;
            }

            $data->type = $request->type;
            $data->name_en = $request->name_en;
            $data->name_ar = $request->name_ar;
            $data->des_en = $request->des_en;
            $data->des_ar = $request->des_ar;
        }
        $data->save();
        return 200;
    }

    public function show(string $id)
    {
        $data = Detail::find($id);
        return $data;
    }

    public function update(Request $request, string $id)
    {
        $data = Detail::find($id);
        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
        $data->des_en = $request->des_en;
        $data->des_ar = $request->des_ar;
        if ($request->type) {
            $data->type = $request->type;
        }
        if ($request->hasFile('img')) {
            $this->delete_img($data->img);
            $img = $request->hasFile('img') ? $this->store_img($request->file('img'), 'Web') : null;
            $data->img = $img;
        }
        if ($request->hasFile('img2')) {
            $img2 = $request->hasFile('img2') ? $this->store_img($request->file('img2'), 'Web') : null;
            $data->img2 = $img2;
        }
        if ($request->hasFile('img3')) {
            $img3 = $request->hasFile('img3') ? $this->store_img($request->file('img3'), 'Web') : null;
            $data->img3 = $img3;
        }
        $data->save();
        return 200;
    }

    public function destroy(string $id)
    {
        $data = Detail::find($id);
        if ($data->img) {
            $this->delete_img($data->img);
        }
        $data->delete();
        return 200;
    }
}
