<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Gallery_caption;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index($username) //ok
    {
        $user = Auth::user()->username;
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $gallery = User::join('galleries', 'users.username', '=', 'galleries.username_id')->get();
        } else {
            $gallery = User::join('galleries', 'users.username', '=', 'galleries.username_id')
            ->where('username_id', '=', $user)
            ->get();
        }
        return view('admin.gallery', compact('gallery', 'user', 'role'));
    }

    public function indexStory($username) //ok
    {
        $user = Auth::user()->username;
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $story = User::join('stories', 'users.username', '=', 'stories.username_id')->get();
        } else {
            $story = User::join('stories', 'users.username', '=', 'stories.username_id')
            ->where('username_id', '=', $user)
            ->get();
        }
        return view('admin.story', compact('user', 'role', 'story'));
    }

    public function addStory($username) //ok
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $user = User::where('username', $username)->first();
        } else {
            $user = Auth::user()->username;
        }
        return view('admin.story-add', compact('user', 'role'));
    }

    public function storeStory(Request $request, $user) //ok
    {
        $this->validate($request, [
            'picture'   => 'required|image|mimes:png,jpg,jpeg',
            'subject'   => 'required',
            'date'      => 'required',
            'message'   => 'required',
        ]);

        $picture = $request->file('picture');
        $user = Auth::user()->username;
        $picture->storeAs('public/images', $picture->hashName());

        $data = Story::create([
            'username_id'   => $request->username_id,
            'subject'       => $request->subject,
            'picture'       => $picture->hashName(),
            'date'          => $request->date,
            'message'       => $request->message
        ]);

        if ($data) {
            return redirect()->route('admin.story.data', $user)->with('success', 'Data berhasil ditambahkan, Silahkan isi form berikutnya == Master -> Gallery ==');
        }
    }

    public function updateStory(Request $request, Story $data) //ok
    {
        $this->authorize('update', Story::class);

        $userUpdate = Auth::user()->username;
        $data = Story::findOrFail($data->id);

        if ($request->file('picture') == "") {
            $data->update([
                'username_id'   => $request->username_id,
                'subject'       => $request->subject,
                'date'          => $request->date,
                'message'       => $request->message
            ]);
        } else {
            Storage::disk('local')->delete('public/images/' . $data->picture);
            $picture = $request->file('picture');
            $picture->storeAs('public/images', $picture->hashName());

            $data->update([
                'username_id'   => $request->username_id,
                'subject'       => $request->subject,
                'picture'       => $picture->hashName(),
                'date'          => $request->date,
                'message'       => $request->message
            ]);
        }

        if ($data) {
            return redirect()->route('admin.story.data', $userUpdate)->with('success', 'Data updated successfully');
        }
    }

    public function destroyStory(Story $story) //ok
    {
        $this->authorize('delete', Story::class);

        $story->find($story->id)->all();
        $username = $story['username_id'];

        Storage::disk('local')->delete('public/images/' . $story->picture);
        $story->delete();

        if ($story) {
            return redirect()->route('admin.story.data', $username)->with('success', 'Data deleted successfully');
        }
    }

    public function addGallery($username) //ok
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $user = User::where('username', $username)->first();
        } else {
            $user = Auth::user()->username;
        }
        return view('admin.gallery-add', compact('user', 'role'));
    }

    public function storeGallery(Request $request, $user) //ok
    {
        $user = Auth::user()->username;
        $this->validate($request, [
            'picture'       => 'required|image|mimes:png,jpg,jpeg',
            'caption'       => 'required',
        ]);

        $picture = $request->file('picture');
        $picture->storeAs('public/images', $picture->hashName());

        $data = Gallery::create([
            'username_id'   => $request->username_id,
            'picture'       => $picture->hashName(),
            'caption'       => $request->caption,
        ]);

        if ($data) {
            return redirect()->route('admin.gallery.data', $user)->with('success', 'Selesai! Data berhasil ditambahkan, Silahkan cek == Master -> Contact Information ==');
        }
    }

    public function updateGallery(Request $request, Gallery $data) //ok
    {
        $this->authorize('update', Gallery::class);

        $userUpdate = Auth::user()->username;

        $data = Gallery::findOrFail($data->id);

        if ($request->file('picture') == "") {
            $data->update([
                'username_id'   => $request->username_id,
                'caption'       => $request->caption
            ]);
            // dd($data);
        } else {
            Storage::disk('local')->delete('public/images/' . $data->picture);
            $picture = $request->file('picture');
            $picture->storeAs('public/images', $picture->hashName());

            $data->update([
                'username_id'   => $request->username_id,
                'caption'       => $request->caption,
                'picture'       => $picture->hashName()
            ]);
        }

        if ($data) {
            return redirect()->route('admin.gallery.data', $userUpdate)->with('success', 'Data updated successfully');
        }
    }

    public function destroyGallery(Gallery $gallery) //ok
    {
        $this->authorize('delete', Gallery::class);

        $gallery->find($gallery->id)->all();
        $username = $gallery['username_id'];

        Storage::disk('local')->delete('public/images/' . $gallery->picture);
        $gallery->delete();

        if ($gallery) {
            return redirect()->route('admin.gallery.data', $username)->with('success', 'Data deleted successfully');
        }
    }

    public function headGallery() //ok
    {
        $user = Auth::user()->username;
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $gallery_caption = User::join('gallery_captions', 'users.username', '=', 'gallery_captions.username_id')->get();
        } else {
            $gallery_caption = User::join('gallery_captions', 'users.username', '=', 'gallery_captions.username_id')
            ->where('username_id', '=', $user)
            ->get();
        }

        return view('admin.gallery-head', compact('user', 'role', 'gallery_caption'));
    }

    public function addheadGallery($username) //ok
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $user = User::where('username', $username)->first();
        } else {
            $user = Auth::user()->username;
        }
        return view('admin.gallery-head-add', compact('user', 'role'));
    }

    public function storeheadGallery(Request $request, $user) //ok
    {
        $this->authorize('create', Gallery_caption::class);
        $user = Auth::user()->username;
        $this->validate($request, [
            'head_picture'  => 'required|image|mimes:png,jpg,jpeg',
            'head_story'    => 'required',
            'head_gallery'  => 'required',
        ]);

        $head_picture = $request->file('head_picture');
        $head_picture->storeAs('public/images', $head_picture->hashName());

        $data = Gallery_caption::create([
            'username_id'   => $request->username_id,
            'head_picture'  => $head_picture->hashName(),
            'head_story'    => $request->head_story,
            'head_gallery'  => $request->head_gallery,
            'head_video'    => $request->head_video,
            'url_video'     => $request->url_video,
        ]);

        if ($data) {
            return redirect()->route('admin.gallery.head', $user)->with('success', 'Data berhasil ditambahkan, Silahkan isi form berikutnya == Master -> Story ==');
        }
    }

    public function updateHeadGallery(Request $request, Gallery_caption $data) //ok
    {
        $this->authorize('update', Gallery_caption::class);

        $userUpdate = Auth::user()->username;
        $data = Gallery_caption::findOrFail($data->id);
       
        if ($request->file('pic_man') == "" || $request->file('pic_women') == "") {
            $data->update([
                'username_id'   => $request->username_id,
                'head_story'    => $request->head_story,
                'head_gallery'  => $request->head_gallery,
                'head_video'    => $request->head_video,
                'url_video'     => $request->url_video,
            ]);
        } else {
            Storage::disk('local')->delete('public/images/' . $data->head_picture);
            $head_picture = $request->file('head_picture');
            $head_picture->storeAs('public/images', $head_picture->hashName());

            $data->update([
                'username_id'   => $request->username_id,
                'head_picture'  => $head_picture->hashName(),
                'head_story'    => $request->head_story,
                'head_gallery'  => $request->head_gallery,
                'head_video'    => $request->head_video,
                'url_video'     => $request->url_video,
            ]);
        }

        if ($data) {
            return redirect()->route('admin.gallery.head', $userUpdate)->with('success', 'Data updated successfully');
        }
    }

    public function destroyHeadGallery(Gallery_caption $galleryCaption) //ok
    {
        $this->authorize('delete', Gallery_caption::class);

        $galleryCaption->find($galleryCaption->id)->all();
        $username = $galleryCaption['username_id'];

        Storage::disk('local')->delete('public/images/' . $galleryCaption->picture);
        $galleryCaption->delete();

        if ($galleryCaption) {
            return redirect()->route('admin.gallery.head', $username)->with('success', 'Data deleted successfully');
        }
    }
}
