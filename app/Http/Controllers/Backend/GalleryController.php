<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Gallery_caption;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Nullable;

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

    public function storeGallery(Request $request)
    {
        $this->validate($request, [
            'username_id'   => Auth::user()->username,
            'picture'       => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $picture = $request->file('picture');
        $picture->storeAs('public/images', $picture->hashName());

        $data = Gallery::create([
            'username_id'   => Auth::user()->username,
            'picture'       => $picture->hashName(),
            'caption'       => $request->caption,
        ]);

        if ($data) {
            return redirect()->route('admin.gallery.data')->with('success', 'Data added successfully');
        }
    }

    public function updateGallery(Request $request, Gallery $data)
    {
        $this->authorize('update', Gallery::class);

        $this->validate($request, [
            'picture'   => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $data = Gallery::findOrFail($data->id);

        if ($request->file('picture') == "") {
            $data->update([
                'username_id'   => Auth::user()->username,
                'caption'       => $request->caption
            ]);
        } else {
            Storage::disk('local')->delete('public/images/' . $data->picture);
            $picture = $request->file('picture');
            $picture->storeAs('public/images', $picture->hashName());

            $data->update([
                'username_id'   => Auth::user()->username,
                'caption'       => $request->caption,
                'picture'       => $picture->hashName()
            ]);
        }

        if ($data) {
            return redirect()->route('admin.gallery.data')->with('success', 'Data updated successfully');
        }
    }

    public function destroyGallery(Gallery $gallery)
    {
        $this->authorize('delete', Gallery::class);

        $gallery->find($gallery->id)->all();

        Storage::disk('local')->delete('public/images/' . $gallery->picture);
        $gallery->delete();

        if ($gallery) {
            return redirect()->route('admin.gallery.data')->with('success', 'Data deleted successfully');
        }
    }

    public function storeStory(Request $request)
    {
        $this->validate($request, [
            'picture'   => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $picture = $request->file('picture');
        $picture->storeAs('public/images', $picture->hashName());

        $data = Story::create([
            'username_id'   => Auth::user()->username,
            'subject'       => $request->subject,
            'picture'       => $picture->hashName(),
            'date'          => $request->date,
            'message'       => $request->message
        ]);

        if ($data) {
            return redirect()->route('admin.story.data')->with('success', 'Data added successfully');
        }
    }

    public function updateStory(Request $request, Story $data)
    {
        $this->authorize('update', Story::class);

        $this->validate($request, [
            'picture'   => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $data = Story::findOrFail($data->id);

        if ($request->file('picture') == "") {
            $data->update([
                'username_id'   => Auth::user()->username,
                'subject'       => $request->subject,
                'date'          => $request->date,
                'message'       => $request->message
            ]);
        } else {
            Storage::disk('local')->delete('public/images/' . $data->picture);
            $picture = $request->file('picture');
            $picture->storeAs('public/images', $picture->hashName());

            $data->update([
                'subject'       => $request->subject,
                'picture'       => $picture->hashName(),
                'date'          => $request->date,
                'message'       => $request->message
            ]);
        }

        if ($data) {
            return redirect()->route('admin.story.data')->with('success', 'Data updated successfully');
        }
    }

    public function destroyStory(Story $story)
    {
        $this->authorize('delete', Story::class);

        $story->find($story->id)->all();

        Storage::disk('local')->delete('public/images/' . $story->picture);
        $story->delete();

        if ($story) {
            return redirect()->route('admin.story.data')->with('success', 'Data deleted successfully');
        }
    }

    public function headGallery()
    {
        $data = Gallery_caption::all();
        return view('admin.gallery-head', compact('data'));
    }

    public function storeheadGallery(Request $request)
    {
        $this->authorize('create', Gallery_caption::class);

        $data = Gallery_caption::create([
            'username_id'   => Auth::user()->username,
            'head_story'    => $request->head_story,
            'head_gallery'  => $request->head_gallery,
            'head_video'    => $request->head_video
        ]);

        if ($data) {
            return redirect()->route('admin.gallery.head')->with('success', 'Data added successfully');
        }
    }

    public function updateHeadGallery(Request $request, Gallery_caption $data)
    {
        $this->authorize('update', Gallery_caption::class);

        $data = Gallery_caption::findOrFail($data->id);

        $data->update([
            'username_id'   => Auth::user()->username,
            'head_story'    => $request->head_story,
            'head_gallery'  => $request->head_gallery,
            'head_video'    => $request->head_video,
        ]);

        if ($data) {
            return redirect()->route('admin.gallery.head')->with('success', 'Data updated successfully');
        }
    }

    public function destroyHeadGallery(Gallery_caption $galleryCaption)
    {
        $this->authorize('delete', Gallery_caption::class);

        $galleryCaption->find($galleryCaption->id)->all();

        $galleryCaption->delete();

        if ($galleryCaption) {
            return redirect()->route('admin.gallery.head')->with('success', 'Data deleted successfully');
        }
    }
}
