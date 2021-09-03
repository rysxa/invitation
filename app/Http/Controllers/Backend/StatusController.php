<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function index()
    {
        $this->authorize('view', User::class);
        $user = Auth::user()->id;
        // $user = Auth::user()->slug;

        // $event = User::join('events', 'users.username', '=', 'events.username_id')->get();
        // dd($user);
        $event = Event::all();
        // $event = User::join('events', 'events.slug_id', $user)->get();
        // dd($event);

        return view('admin.status', compact('user', 'event'));
    }
}
