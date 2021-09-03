<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Contact_info;
use App\Models\Event;
use App\Models\Gallery_caption;
use App\Models\User;
use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index($id)
    {
        $slug = User::where('slug', $id)->first();
        $event = DB::table('events')->where('slug_id', $slug->id)->first();
        $attendance = Attendance::all();
        $wish = DB::table('wishes')->where('slug_id', $slug->id)->where('status', '=', 1)->paginate(2);
        $contact_info = Contact_info::all();
        $gallery_head = Gallery_caption::all();
        if ($event == null) {
            return view('emptypage');
        } else {
            return view('wedding.index', compact('attendance', 'wish', 'event', 'contact_info', 'gallery_head', 'slug'));
        }
    }

    public function dashboard()
    {
        return view('wedding.dashboard');
    }

    public function create(Request $request)
    {
        $data = Attendance::create([
            'slug_id'   => $request->slug_id,
            'name'      => ucwords($request->name),
            'email'     => $request->email,
            'phone'     => $request->phone,
            'status'    => $request->status,
        ]);

        $user = User::where('id', $data['slug_id'])->first();
        if ($data) {
            return redirect()->route('front.data.wish', $user->slug)->with('success', 'Thank you, the form you have filled has been accepted');
        }
    }
}
