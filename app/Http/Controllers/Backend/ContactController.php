<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Contact_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::all();
        return view('admin.contact', compact('data',));
    }

    public function indexContactInfo()
    {
        $data = Contact_info::all();
        return view('admin.contact-info', compact('data',));
    }

    public function addContactInfo()
    {
        return view('admin.contact-info-add');
    }

    public function createContactInfo(Request $request)
    {
        $data = Contact_info::create([
            'username_id'   => Auth::user()->username,
            'address'       => $request->address,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'wa'            => $request->wa,
            'twitter'       => $request->twitter,
            'instagram'     => $request->instagram,
            'facebook'      => $request->facebook
        ]);

        if ($data) {
            return redirect()->route('admin.contactinfo.data');
        }
    }

    public function updateContactInfo(Request $request, Contact_info $data)
    {
        $this->authorize('update', Contact_info::class);

        $data = Contact_info::findOrFail($data->id);

        $data->update([
            'username_id'   => Auth::user()->username,
            'address'       => $request->address,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'wa'            => $request->wa,
            'twitter'       => $request->twitter,
            'instagram'     => $request->instagram,
            'facebook'      => $request->facebook
        ]);

        if ($data) {
            return redirect()->route('admin.contactinfo.data')->with('success', 'Data updated successfully');
        }
    }

    public function destroyContactInfo(Contact_info $contactInfo)
    {
        $this->authorize('delete', Contact_info::class);

        $contactInfo->find($contactInfo->id)->all();

        $contactInfo->delete();

        if ($contactInfo) {
            return redirect()->route('admin.contactinfo.data')->with('success', 'Data deleted successfully');
        }
    }

    public function updateContact(Request $request, Contact $data)
    {
        $this->authorize('update', Contact::class);

        $data = Contact::findOrFail($data->id);

        $data->update([
            'username_id'   => Auth::user()->username,
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone
        ]);

        if ($data) {
            return redirect()->route('admin.contact.data')->with('success', 'Data updated successfully');
        }
    }

    public function destroyContact(Contact $contact)
    {
        $this->authorize('delete', Contact::class);

        $contact->find($contact->id)->all();

        $contact->delete();

        if ($contact) {
            return redirect()->route('admin.contact.data')->with('success', 'Data deleted successfully');
        }
    }
}
