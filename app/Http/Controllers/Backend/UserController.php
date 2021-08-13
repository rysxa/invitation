<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index($username)
    {
        $this->authorize('view', User::class);

        $user = Auth::user()->username;
        $data = User::all();
        // dd($data);

        return view('admin.user', compact('user', 'data'));
    }

    public function add($username)
    {
        $this->authorize('create', User::class);

        $user = User::where('username', $username)->first();

        return view('admin.user-add', compact('user'));
    }

    public function store(Request $request, $user)
    {
        $this->authorize('create', User::class);

        $user = Auth::user()->username;
        $this->validate($request, [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username'  => ['required', 'string', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'role'      => ['required'],
        ]);

        $data = User::create([
            'name'      => ucwords($request->name),
            'email'     => $request->email,
            'username'  => strtolower($request->username),
            'password'  => Hash::make($request->password),
            'role'      => $request->role,
            'slug'      => Str::slug($request->username),
        ]);

        if ($data) {
            return redirect()->route('admin.user.data', $user)->with('success', 'Data added successfully');
        }
    }

    public function update(Request $request, User $data)
    {
        $this->authorize('update', User::class);

        $userUpdate = Auth::user()->username;
        $data = User::findOrFail($data->id);

        $data->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'username'  => $request->username,
            // 'password'  => $request->password,
            'role'      => $request->role
        ]);

        if ($data) {
            return redirect()->route('admin.user.data', $userUpdate)->with('success', 'Data updated successfully');
        }
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', User::class);

        $user->find($user->id)->all();
        $username = $user['username_id'];

        $user->delete();

        if ($user) {
            return redirect()->route('admin.user.data', $username)->with('success', 'Data deleted successfully');
        }
    }
}
