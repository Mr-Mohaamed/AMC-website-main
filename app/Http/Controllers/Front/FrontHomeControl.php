<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Contact;
use App\Models\Item;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class FrontHomeControl extends Controller
{
    function index()
    {
        return view('Front.FrontHome');
    }
    function Pricing()
    {
        return view('Front.Pricing');
    }
    function Blogs()
    {
        return view('Front.Blogs');
    }

    function BlogPost($post_id)
    {
        $post = Post::findOrFail($post_id)->load('sections');

        return view('Front.BlogPost', ['post' => $post]);
    }

    public function changeLanguage($locale)
    {
        if (!in_array($locale, ['en', 'ar'])) {
            abort(400);
        }
        Session::put('locale', $locale);
        App::setLocale($locale);
        return back();
    }

    function About_Us()
    {
        return view('Front.AboutUs');
    }

    function contact()
    {
        return view('Front.Contact');
    }

    function user_content(Request $request)
    {
        $request->validate([
            'name' => "required|string|max:255",
            'email' => "required|string|email",
            'phone' => "required|string|max:255",
            'content' => "required|string|max:255",
            'budget' => "required|string|max:255",
            'product_type' => "required|string|max:255",
        ]);
        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->item_id = $request->product_type;
        $data->content = $request->content;
        $data->budget = $request->budget;
        $data->save();
        return 200;
    }

    function category($id)
    {
        $data['cat'] = Cat::with('items')->find($id);
        return view('Front.Category.Category')->with($data);
    }

    function item($id)
    {
        $data['item'] = Item::with('images')->find($id);
        $data['cat'] = Cat::with('items')->find($data['item']->cat_id);
        return view('Front.Category.Item')->with($data);
    }
}
