<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
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
