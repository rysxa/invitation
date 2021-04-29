<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function index()
    {
        $data = Wish::all();
        return view('admin.wishes', compact('data'));
    }

    public function create(Request $request)
    {
        $data = Wish::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'message'   => $request->message
        ]);

        if ($data) {
            return redirect()->route('front.data.wish');
        }
    }
}
