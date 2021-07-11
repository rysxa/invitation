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
        $user = User::where('username', $username)->first(); 
        $event = User::join('events', 'users.username', '=', 'events.username_id')
            ->where('status', '=', 1)
            ->get();
        $contact_info = User::join('contact_infos', 'users.username', '=', 'contact_infos.username_id')->get();
        $gallery_head = User::join('gallery_captions', 'users.username', '=', 'gallery_captions.username_id')->get();

        return view('wedding.contact', compact('event', 'contact_info', 'user', 'gallery_head'));
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
