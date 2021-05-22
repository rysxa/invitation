<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Gallery_caption;
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

    public function addStory()
    {
        return view('admin.story-add');
    }

    public function addGallery()
    {
        return view('admin.gallery-add');
    }

    public function addheadGallery()
    {
        return view('admin.gallery-head-add');
    }

    public function createGallery(Request $request)
    {
        $this->validate($request, [
            'picture'   => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $picture = $request->file('picture');
        $picture->storeAs('public/images', $picture->hashName());

        $data = Gallery::create([
            'picture'           => $picture->hashName(),
            'caption'           => $request->caption,
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
            'subject'       => $request->subject,
            'picture'       => $picture->hashName(),
            'date'          => $request->date,
            'message'       => $request->message
        ]);

        if ($data) {
            return redirect()->route('admin.story.data');
        }
    }

    public function headGallery()
    {
        $data = Gallery_caption::all();
        return view('admin.gallery-head', compact('data'));
    }

    public function createheadGallery(Request $request)
    {
        $data = Gallery_caption::create([
            'head_story'    => $request->head_story,
            'head_gallery'  => $request->head_gallery,
            'head_video'    => $request->head_video
        ]);

        if ($data) {
            return redirect()->route('admin.gallery.head');
        }
    }
}
