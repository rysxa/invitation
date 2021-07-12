<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function index($username)
    {
        $this->authorize('view', User::class);
        $user = Auth::user()->username;
        $event = User::join('events', 'users.username', '=', 'events.username_id')->get();

        return view('admin.status', compact('user', 'event'));
    }
}
