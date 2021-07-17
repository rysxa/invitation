<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', '=', $username)->first()->username;
        $attendance = DB::table('users')
            ->join('attendances', 'users.username', '=', 'attendances.username_id')
            ->where('username_id', '=', $username)
            ->first();
        $wish = DB::table('users')
            ->join('wishes', 'users.username', '=', 'wishes.username_id')
            ->where('username_id', '=', $username)
            ->get();
        $event = DB::table('users')
            ->join('events', 'users.username', '=', 'events.username_id')
            ->where('username_id', '=', $username)
            ->first();
        $contact_info = DB::table('users')
            ->join('contact_infos', 'users.username', '=', 'contact_infos.username_id')
            ->where('username_id', '=', $username)
            ->first();
        $gallery_head = DB::table('users')
            ->join('gallery_captions', 'users.username', '=', 'gallery_captions.username_id')
            ->where('username_id', '=', $username)
            ->first();
            
        if (!$event && !$contact_info && !$gallery_head) {
            return view('emptypage');
        } else {
            return view('wedding.index', compact('attendance', 'wish', 'event', 'contact_info', 'user', 'gallery_head'));
        }
    }

    public function dashboard()
    {
        return view('wedding.dashboard');
    }

    public function create(Request $request, $username)
    {
        $user = User::where('username', '=', $username)->first()->username;

        $data = Attendance::create([
            'name'          => ucwords($request->name),
            'username_id'   => $user,
            'email'         => $request->email,
            'phone'         => $request->phone
        ]);

        if ($data) {
            return redirect()->route('front.data.wish', $user)->with('success', 'Thank you, the form you have filled has been accepted');
        }
    }
}
