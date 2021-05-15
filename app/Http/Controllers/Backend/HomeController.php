<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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
}
