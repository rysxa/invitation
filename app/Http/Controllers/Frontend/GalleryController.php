<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', '=', $username)->first()->username;
        $gallery = User::join('galleries', 'users.username', '=', 'galleries.username_id')
            ->where('username_id', '=', $username)
            ->get();
        $event = DB::table('users')
            ->join('events', 'users.username', '=', 'events.username_id')
            ->where('status', '=', 1)
            ->where('username_id', '=', $username)
            ->first();
        $story = DB::table('users')
            ->join('stories', 'users.username', '=', 'stories.username_id')
            ->where('username_id', '=', $username)
            ->get();
        $gallery_head = DB::table('users')
            ->join('gallery_captions', 'users.username', '=', 'gallery_captions.username_id')
            ->where('username_id', '=', $username)
            ->first();
        $contact_info = DB::table('users')
            ->join('contact_infos', 'users.username', '=', 'contact_infos.username_id')
            ->where('username_id', '=', $username)
            ->first();

        return view('wedding.gallery', compact('event', 'gallery', 'story', 'gallery_head', 'contact_info', 'user'));
    }
}
