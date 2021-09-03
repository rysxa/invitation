<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Gallery_caption;
use App\Models\Story;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index($id)
    {
        $slug           = User::where('slug', $id)->first();
        $event          = Event::where('slug_id', $slug->id)->first();
        $contact_info   = Gallery::where('slug_id', $slug->id)->first();
        $gallery_head   = Gallery_caption::where('slug_id', $slug->id)->get();
        $gallery        = Gallery::where('slug_id', $slug->id)->get();
        $story          = Story::where('slug_id', $slug->id)->get();
        if ($contact_info == null) {
            return view('emptypage');
        } else {
            return view('wedding.gallery', compact('event' ,'story','gallery' ,'gallery_head', 'contact_info', 'slug'));
        }
    }
}
