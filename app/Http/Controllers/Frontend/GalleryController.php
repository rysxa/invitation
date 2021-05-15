<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Story;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();
        $event = Event::all();
        $story = Story::all();
        return view('wedding.gallery', compact('event', 'gallery', 'story'));
    }
}
