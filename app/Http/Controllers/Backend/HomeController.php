<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->first();
        $data = Attendance::all();
        return view('admin.attendance', compact('data', 'user'));
    }

    public function dashboard($username)
    {
        $user = User::where('username', $username)->first();
        return view('admin.index', compact('user'));
    }
}
