<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function create(Request $request, $username)
    {
        $data = Wish::create([
            'name'          => ucwords($request->name),
            'username_id'   => $request->username_id,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'message'       => $request->message
        ]);

        if ($data) {
            return redirect()->route('front.data.wish', $data['username_id'])->with('success', 'Thank you for your kind wishes');
        }
    }
}
