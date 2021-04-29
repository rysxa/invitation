<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $data = Event::all();
        return view('admin.event', compact('data'));
    }

    public function add()
    {
        return view('admin.event-add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'pic_man'   => 'required|image|mimes:png,jpg,jpeg',
            'pic_women' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $pic_man = $request->file('pic_man');
        $pic_women = $request->file('pic_women');
        $pic_man->storeAs('public/images', $pic_man->hashName());
        $pic_women->storeAs('public/images', $pic_women->hashName());

        $data = Event::create([
            'title'                 => $request->title,
            'date_wedding'          => $request->date_wedding,
            'address'               => $request->address,
            'city'                  => $request->city,
            'caption'               => $request->caption,
            'user_man'              => $request->user_man,
            'pic_man'               => $pic_man->hashName(),
            'caption_man'           => $request->caption_man,
            'user_women'            => $request->user_women,
            'pic_women'             => $pic_women->hashName(),
            'caption_women'         => $request->caption_women,
            'ceremony_date'         => $request->ceremony_date,
            'ceremony_time_start'   => $request->ceremony_time_start,
            'ceremony_time_end'     => $request->ceremony_time_end,
            'ceremony_caption'      => $request->ceremony_caption,
            'party_date'            => $request->party_date,
            'party_time_start'      => $request->party_time_start,
            'party_time_end'        => $request->party_time_end,
            'party_caption'         => $request->party_caption,
            'status'                => 1
        ]);

        if ($data) {
            return redirect()->route('admin.data.event');
        }
    }
}
