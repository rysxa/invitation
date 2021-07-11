<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->first();
        $event = User::join('events', 'users.username', '=', 'events.username_id')
            ->where('status', '=', 1)
            ->where('username_id', '=', $user->username)
            ->get();
        return view('admin.event', compact('user', 'event'));
    }

    public function add()
    {
        return view('admin.event-add');
    }

    public function store(Request $request)
    {
        // privilege
        $this->authorize('create', Event::class);

        $this->validate($request, [
            'pic_man'   => 'required|image|mimes:png,jpg,jpeg',
            'pic_women' => 'required|image|mimes:png,jpg,jpeg',
            'username_id' => 'limit'
        ]);

        $pic_man = $request->file('pic_man');
        $pic_women = $request->file('pic_women');
        $pic_man->storeAs('public/images', $pic_man->hashName());
        $pic_women->storeAs('public/images', $pic_women->hashName());

        $data = Event::create([
            'username_id'           => Auth::user()->username,
            'title'                 => $request->title,
            'date_wedding'          => $request->date_wedding,
            'address'               => $request->address,
            'city'                  => $request->city,
            'caption'               => $request->caption,
            'man_first'             => $request->man_first,
            'man_last'              => $request->man_last,
            'pic_man'               => $pic_man->hashName(),
            'caption_man'           => $request->caption_man,
            'women_first'            => $request->women_first,
            'women_last'            => $request->women_last,
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
            return redirect()->route('admin.data.event')->with('success', 'Data added successfully');
        }
    }

    public function update(Request $request, Event $data)
    {
        $this->authorize('update', Event::class);

        $data = Event::findOrFail($data->id);

        if ($request->file('pic_man') === "" || $request->file('pic_women') === "") {
            $data->update([
                'username_id'           => Auth::user()->username,
                'title'                 => $request->title,
                'date_wedding'          => $request->date_wedding,
                'address'               => $request->address,
                'city'                  => $request->city,
                'caption'               => $request->caption,
                'man_first'             => $request->man_first,
                'man_last'              => $request->man_last,
                'caption_man'           => $request->caption_man,
                'women_first'           => $request->women_first,
                'women_last'            => $request->women_last,
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
        } else {
            Storage::disk('local')->delete('public/images/' . $data->pic_man);
            Storage::disk('local')->delete('public/images/' . $data->pic_women);
            $pic_man = $request->file('pic_man');
            $pic_women = $request->file('pic_women');
            $pic_man->storeAs('public/images', $pic_man->hashName());
            $pic_women->storeAs('public/images', $pic_women->hashName());

            $data->update([
                'title'                 => $request->title,
                'date_wedding'          => $request->date_wedding,
                'address'               => $request->address,
                'city'                  => $request->city,
                'caption'               => $request->caption,
                'man_first'             => $request->man_first,
                'man_last'              => $request->man_last,
                'pic_man'               => $pic_man->hashName(),
                'caption_man'           => $request->caption_man,
                'women_first'           => $request->women_first,
                'women_last'            => $request->women_last,
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
        }

        if ($data) {
            return redirect()->route('admin.data.event')->with('success', 'Data updated successfully');
        }
    }

    public function destroy(Event $event)
    {
        $this->authorize('delete', Event::class);

        $event->find($event->id)->all();

        Storage::disk('local')->delete('public/images/' . $event->pic_man);
        Storage::disk('local')->delete('public/images/' . $event->pic_women);
        $event->delete();

        if ($event) {
            return redirect()->route('admin.data.event')->with('success', 'Data deleted successfully');
        }
    }
}
