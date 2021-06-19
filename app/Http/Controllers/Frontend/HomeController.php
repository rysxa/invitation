<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Contact_info;
use App\Models\Event;
use App\Models\User;
use App\Models\Wish;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(User $user)
    {
        $attendance     = Attendance::all();
        $wish           = Wish::all();
        $event          = Event::where('status', '=', 1)->get();
        $contact_info   = Contact_info::all();
        return view('wedding.index', compact('attendance', 'wish', 'event', 'contact_info'));
    }

    public function create(Request $request)
    {
        $data = Attendance::create([
            'name'      => ucwords($request->name),
            'email'     => $request->email,
            'phone'     => $request->phone
        ]);

        if ($data) {
            return redirect()->route('front.data.wish')->with('success', 'Thank you, the form you have filled has been accepted');
        }
    }
}
