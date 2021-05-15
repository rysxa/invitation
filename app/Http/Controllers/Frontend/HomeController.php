<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Event;
use App\Models\Wish;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $attendance     = Attendance::all();
        $wish           = Wish::all();
        $event          = Event::where('status', '=', 1)->get();
        return view('wedding.index', compact('attendance', 'wish', 'event'));
    }

    public function create(Request $request)
    {
        $data = Attendance::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone
        ]);

        if ($data) {
            return redirect()->route('front.data.wish');
        }
    }
}
