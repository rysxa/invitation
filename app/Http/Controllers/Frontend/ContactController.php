<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Contact_info;
use App\Models\Event;
use App\Models\Gallery_caption;
use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index($id)
    {
        $slug           = User::where('slug', $id)->first();
        $event          = Event::where('slug_id', $slug->id)->first();
        $contact_info   = Contact_info::where('slug_id', $slug->id)->first();
        $gallery_head   = Gallery_caption::where('slug_id', $slug->id)->get();
        if ($contact_info == null) {
            return view('emptypage');
        } else {
            return view('wedding.contact', compact('event' ,'contact_info', 'gallery_head', 'slug'));
        }
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
