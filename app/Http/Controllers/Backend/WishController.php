<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishController extends Controller
{
    public function index()
    {
        $slug = Auth::user()->slug;
        $role = Auth::user()->role_id;
        $user = User::where('slug', $slug)->first();
        if ($role == 1) {
            $wish = Wish::all();
        } else {
            $wish = Wish::where('slug_id', '=', $user->id)->get();
        }
        return view('admin.wishes', compact('user', 'role', 'wish'));
    }

    public function updateMessage(Request $request, Wish $data)
    {
        $this->authorize('update', Wish::class);

        $userUpdate = Auth::user()->slug;
        $data = Wish::findOrFail($data->id);

        $data->update([
            'slug_id'   => $request->slug_id,
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'message'   => $request->message,
            'status'    => $request->status,
        ]);

        if ($data) {
            return redirect()->route('admin.data.wish', $userUpdate)->with('success', 'Data updated successfully');
        }
    }

    public function destroyMessage(Wish $wish)
    {
        $this->authorize('delete', Wish::class);

        $wish->find($wish->id)->all();

        $wish->delete();

        if ($wish) {
            return redirect()->route('admin.data.wish', $wish->id)->with('success', 'Data deleted successfully');
        }
    }

    public function indexAttendance()
    {
        $slug = Auth::user()->slug;
        $role = Auth::user()->role_id;
        $user = User::where('slug', $slug)->first();
        if ($role == 1) {
            $attendance = Attendance::all();
        } else {
            $attendance = Attendance::where('slug_id', '=', $user->id)->get();
        }
        return view('admin.attendance', compact('role', 'user', 'attendance'));
    }

    public function updateAttendance(Request $request, Attendance $data)
    {
        $this->authorize('update', Attendance::class);

        $userUpdate = Auth::user()->username;
        $data = Attendance::findOrFail($data->id);

        $data->update([
            'slug_id'   => $request->slug_id,
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'status'    => $request->status,
        ]);

        if ($data) {
            return redirect()->route('admin.data.attendance', $userUpdate)->with('success', 'Data updated successfully');
        }
    }

    public function destroyAttendance(Attendance $attendance)
    {
        $this->authorize('delete', Attendance::class);

        $attendance->find($attendance->id)->all();

        $attendance->delete();

        if ($attendance) {
            return redirect()->route('admin.data.attendance', $attendance->id)->with('success', 'Data deleted successfully');
        }
    }
}
