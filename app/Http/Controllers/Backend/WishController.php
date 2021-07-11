<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishController extends Controller
{
    public function index($username) //ok
    {
        $user = Auth::user()->username;
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $wish = User::join('wishes', 'users.username', '=', 'wishes.username_id')->get();
        } else {
            $wish = User::join('wishes', 'users.username', '=', 'wishes.username_id')
            ->where('username_id', '=', $user)
            ->get();
        }
        return view('admin.wishes', compact('user', 'role', 'wish'));
    }

    public function updateMessage(Request $request, Wish $data) //ok
    {
        $this->authorize('update', Wish::class);

        $userUpdate = Auth::user()->username;
        $data = Wish::findOrFail($data->id);

        $data->update([
            'username_id'   => $request->username_id,
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'message'       => $request->message
        ]);

        if ($data) {
            return redirect()->route('admin.data.wish', $userUpdate)->with('success', 'Data updated successfully');
        }
    }

    public function destroyMessage(Wish $wish) //ok
    {
        $this->authorize('delete', Wish::class);

        $username = $wish['username_id'];
        $wish->find($wish->id)->all();

        $wish->delete();

        if ($wish) {
            return redirect()->route('admin.data.wish', $username)->with('success', 'Data deleted successfully');
        }
    }

    public function indexAttendance($username) //ok
    {
        $user = Auth::user()->username;
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $attendance = User::join('attendances', 'users.username', '=', 'attendances.username_id')->get();
        } else {
            $attendance = User::join('attendances', 'users.username', '=', 'attendances.username_id')
            ->where('username_id', '=', $user)
            ->get();
        }

        return view('admin.attendance', compact('role', 'user', 'attendance'));
    }

    public function updateAttendance(Request $request, Attendance $data) //ok
    {
        $this->authorize('update', Attendance::class);

        $userUpdate = Auth::user()->username;
        $data = Attendance::findOrFail($data->id);

        $data->update([
            'username_id'   => $request->username_id,
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone
        ]);

        if ($data) {
            return redirect()->route('admin.data.attendance', $userUpdate)->with('success', 'Data updated successfully');
        }
    }

    public function destroyAttendance(Attendance $attendance) //ok
    {
        $this->authorize('delete', Attendance::class);

        $attendance->find($attendance->id)->all();
        $username = $attendance['username_id'];

        $attendance->delete();

        if ($attendance) {
            return redirect()->route('admin.data.attendance', $username)->with('success', 'Data deleted successfully');
        }
    }
}
