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
        $user = User::where('username', $username)->first();
        $gallery = User::join('galleries', 'users.username', '=', 'galleries.username_id')->get();
        $event = User::join('events', 'users.username', '=', 'events.username_id')
            ->where('status', '=', 1)
            ->get();
        $story = User::join('stories', 'users.username', '=', 'stories.username_id')
            ->orderBy('date')
            ->get();
        $gallery_head = User::join('gallery_captions', 'users.username', '=', 'gallery_captions.username_id')->get();
        $contact_info = User::join('contact_infos', 'users.username', '=', 'contact_infos.username_id')->get();

        return view('wedding.gallery', compact('event', 'gallery', 'story', 'gallery_head', 'contact_info', 'user'));
    }
}
