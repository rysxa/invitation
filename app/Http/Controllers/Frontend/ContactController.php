<?php

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
        $user = User::where('username', $username)->first(); 
        $event = DB::table('users')
            ->join('events', 'users.username', '=', 'events.username_id')
            ->select('*')
            ->where('status', '=', 1)
            ->get();
        $contact_info = DB::table('users')
            ->join('contact_infos', 'users.username', '=', 'contact_infos.username_id')
            ->select('*')
            ->get();
        return view('wedding.contact', compact('event', 'contact_info', 'user'));
    }

    public function create(Request $request, $username)
    {
        $data = Contact::create([
            'name'          => ucwords($request->name),
            'username_id'   => $request->username_id,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'message'       => $request->message
        ]);

        if ($data) {
            return redirect()->route('front.data.contact', $data['username_id'])->with('success', 'Thank you for contacting us');
        }
    }
}
