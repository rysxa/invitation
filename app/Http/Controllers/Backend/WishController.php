<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function index()
    {
        $data = Wish::all();
        return view('admin.wishes', compact('data'));
    }

    public function updateMessage(Request $request, Wish $data)
    {
        $this->authorize('update', Wish::class);

        $data = Wish::findOrFail($data->id);

        $data->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'message'   => $request->message
        ]);

        if ($data) {
            return redirect()->route('admin.data.wish')->with('success', 'Data updated successfully');
        }
    }

    public function destroyMessage(Wish $wish)
    {
        $this->authorize('delete', Wish::class);

        $wish->find($wish->id)->all();

        $wish->delete();

        if ($wish) {
            return redirect()->route('admin.data.wish')->with('success', 'Data deleted successfully');
        }
    }

    public function updateAttendance(Request $request, Attendance $data)
    {
        $this->authorize('update', Attendance::class);

        $data = Attendance::findOrFail($data->id);

        $data->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone
        ]);

        if ($data) {
            return redirect()->route('admin.data.attendance')->with('success', 'Data updated successfully');
        }
    }

    public function destroyAttendance(Attendance $attendance)
    {
        $this->authorize('delete', Attendance::class);

        $attendance->find($attendance->id)->all();

        $attendance->delete();

        if ($attendance) {
            return redirect()->route('admin.data.attendance')->with('success', 'Data deleted successfully');
        }
    }
}
