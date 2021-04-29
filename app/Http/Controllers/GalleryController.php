<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Story;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $data = Gallery::all();
        return view('admin.gallery', compact('data'));
    }

    public function indexStory()
    {
        $data = Story::all();
        return view('admin.story', compact('data'));
    }

    public function indexFront()
    {
        $gallery = Gallery::all();
        $event = Event::all();
        $story = Story::all();
        return view('wedding.gallery', compact('event', 'gallery', 'story'));
    }

    public function addStory()
    {
        return view('admin.story-add');
    }

    public function addGallery()
    {
        return view('admin.gallery-add');
    }

    public function createGallery(Request $request)
    {
        $this->validate($request, [
            'picture'   => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $picture = $request->file('picture');
        $picture->storeAs('public/images', $picture->hashName());

        $data = Gallery::create([
            'caption'           => $request->caption,
            'picture'           => $picture->hashName()
        ]);

        if ($data) {
            return redirect()->route('admin.gallery.data');
        }
    }

    public function createStory(Request $request)
    {
        $this->validate($request, [
            'picture'   => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $picture = $request->file('picture');
        $picture->storeAs('public/images', $picture->hashName());

        $data = Story::create([
            'subject'   => $request->subject,
            'picture'   => $picture->hashName(),
            'date'      => $request->date,
            'message'   => $request->message
        ]);

        if ($data) {
            return redirect()->route('admin.story.data');
        }
    }
}
