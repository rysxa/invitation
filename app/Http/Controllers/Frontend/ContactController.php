<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Event;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
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
