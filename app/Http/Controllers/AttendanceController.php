<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Event;
use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index()
    {
        $data = Attendance::all();
        return view('admin.attendance', compact('data'));
    }

    public function dashboard()
    {
        return view('admin.index');
    }

    public function indexFront()
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
