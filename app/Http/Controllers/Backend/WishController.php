<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function index()
    {
        $data = Wish::all();
        return view('admin.wishes', compact('data'));
    }
}
