<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('view', User::class);

        $user = Auth::user()->slug;
        $data = User::all();
        $role = Role::all();

        return view('admin.user', compact('user', 'data', 'role'));
    }

    public function add()
    {
        $this->authorize('create', User::class);

        $user = Auth::user()->slug;
        return view('admin.user-add', compact('user'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $this->validate($request, [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'slug'      => ['required', 'string', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = User::create([
            'role_id'           => $request->role_id,
            'name'              => ucwords($request->name),
            'email'             => $request->email,
            'email_verified_at' => date("Y-m-d H:i:s"),
            'slug'              => Str::slug(strtolower($request->slug)),
            'password'          => Hash::make($request->password),
        ]);

        if ($data) {
            return redirect()->route('admin.user.data')->with('success', 'Data added successfully');
        }
    }

    public function update(Request $request, User $data)
    {
        // $this->authorize('update', User::class);

        // $data = User::findOrFail($user->id);
        // // dd($data);
        // $data->update([
        //     'role_id'   => $request->role_id,
        //     'slug'      => $request->slug,
        //     'name'      => $request->name,
        //     'email'     => $request->email,
        //     // 'password'  => $request->password,
        // ]);

        // if ($data) {
        //     return redirect()->route('admin.user.data')->with('success', 'Data updated successfully');
        // }
        $userUpdate = Auth::user()->slug;
        $data = User::findOrFail($data->id);

        $data->update([
            'role_id'   => $request->role_id,
            'slug'      => $request->slug,
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'message'   => $request->message,
            'status'    => $request->status,
        ]);

        if ($data) {
            return redirect()->route('admin.user.data', $userUpdate)->with('success', 'Data updated successfully');
        }
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', User::class);

        $user->find($user->id)->all();
        $slug = $user['slug'];

        $user->delete();

        if ($user) {
            return redirect()->route('admin.user.data', $slug)->with('success', 'Data deleted successfully');
        }
    }
}
