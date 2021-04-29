<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Event;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::all();
        return view('admin.contact', compact('data'));
    }

    public function indexFront()
    {
        $event = Event::all();
        return view('wedding.contact', compact('event'));
    }

    public function create(Request $request)
    {
        $data = Contact::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'message'   => $request->message
        ]);

        if ($data) {
            return redirect()->route('front.data.contact');
        }
    }
}
