<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index($username)
    { 
        $user = User::where('username', '=', $username)->first()->username;
        $event = DB::table('users')
            ->join('events', 'users.username', '=', 'events.username_id')
            ->where('username_id', '=', $username)
            ->first();
        // $contact_info = User::join('contact_infos', 'users.username', '=', 'contact_infos.username_id')->get();
        $contact_info = DB::table('users')
            ->join('contact_infos', 'users.username', '=', 'contact_infos.username_id')
            ->where('username_id', '=', $username)
            ->first();
        // $gallery_head = User::join('gallery_captions', 'users.username', '=', 'gallery_captions.username_id')->get();
        $gallery_head = DB::table('users')
            ->join('gallery_captions', 'users.username', '=', 'gallery_captions.username_id')
            ->where('username_id', '=', $username)
            ->first();

        return view('wedding.contact', compact('event', 'contact_info', 'user', 'gallery_head'));
    }

    public function create(Request $request, $username)
    {
        $user = User::where('username', '=', $username)->first()->username;

        $data = Contact::create([
            'name'          => ucwords($request->name),
            'username_id'   => $user,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'message'       => $request->message
        ]);

        if ($data) {
            return redirect()->route('front.data.contact', $user)->with('success', 'Thank you for contacting us');
        }
    }
}
