<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Contact_info;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::all();
        return view('admin.contact', compact('data',));
    }

    public function indexContactInfo()
    {
        $data = Contact_info::all();
        return view('admin.contact-info', compact('data',));
    }

    public function addContactInfo()
    {
        return view('admin.contact-info-add');
    }

    public function createContactInfo(Request $request)
    {
        $data = Contact_info::create([
            'address'   => $request->address,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'wa'        => $request->wa,
            'twitter'   => $request->twitter,
            'instagram' => $request->instagram,
            'facebook'  => $request->facebook
        ]);

        if ($data) {
            return redirect()->route('admin.contactinfo.data');
        }
    }
}
