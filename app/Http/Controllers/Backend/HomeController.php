<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard($username)
    {
        $user = Auth::user()->username;
        // $user = User::where('username', $username)->first();
        return view('admin.index', compact('user'));
    }
}
