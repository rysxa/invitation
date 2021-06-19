<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact_info;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Gallery_caption;
use App\Models\Story;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery        = Gallery::all();
        $event          = Event::all();
        $story          = Story::all();
        $gallery_head   = Gallery_caption::all();
        $contact_info   = Contact_info::all();
        return view('wedding.gallery', compact('event', 'gallery', 'story', 'gallery_head', 'contact_info'));
    }
}
