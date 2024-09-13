<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function view() {
        return view('Admin.Contact.Contact');
    }

    function index() {
        $data = Contact::orderBy('id','desc')->with('item')->get();
        return $data;
    }
    function show($id) {
        $data = Contact::with('item')->find($id);
        return $data;
    }
}
