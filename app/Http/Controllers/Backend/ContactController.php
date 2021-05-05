<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $data = Contact::all();
        return view('admin.contact', compact('data'));
    }
}
