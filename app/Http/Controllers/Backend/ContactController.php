<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Contact_info;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $slug = Auth::user()->slug;
        $role = Auth::user()->role_id;
        $user = User::where('slug', $slug)->first();
        if ($role == 1) {
            $contact = Contact::all();
        } else {
            $contact = Contact::where('slug_id', '=', $user->id)->get();
        }
        return view('admin.contact', compact('user', 'role', 'contact'));
    }

    public function updateContact(Request $request, Contact $data)
    {
        $this->authorize('update', Contact::class);

        $userUpdate = Auth::user()->slug;
        $data = Contact::findOrFail($data->id);

        $data->update([
            'slug_id'   => $request->slug_id,
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone
        ]);

        if ($data) {
            return redirect()->route('admin.contact.data', $userUpdate)->with('success', 'Data updated successfully');
        }
    }

    public function destroyContact(Contact $contact)
    {
        $this->authorize('delete', Contact::class);

        $contact->find($contact->id)->all();
        $username = $contact['slug_id'];

        $contact->delete();

        if ($contact) {
            return redirect()->route('admin.contact.data', $username)->with('success', 'Data deleted successfully');
        }
    }

    public function indexContactInfo()
    {
        $slug = Auth::user()->slug;
        $role = Auth::user()->role_id;
        $user = User::where('slug', $slug)->first();
        if ($role == 1) {
            $contact_info = Contact_info::all();
        } else {
            $contact_info = Contact_info::where('slug_id', '=', $user->id)->get();
        }
        return view('admin.contact-info', compact('user', 'role', 'contact_info'));
    }

    public function addContactInfo()
    {
        $user = User::all();
        $role = Auth::user()->role_id;
        return view('admin.contact-info-add', compact('user', 'role'));
    }

    public function createContactInfo(Request $request)
    {
        // privilege
        $this->authorize('create', Contact_info::class);
        $this->validate($request, [
            'address'   => 'required',
            'phone'     => 'required',
            'email'     => 'required',
            'wa'        => 'required'
        ]);

        $data = Contact_info::create([
            'slug_id'       => $request->slug_id,
            'address'       => $request->address,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'wa'            => $request->wa,
            'twitter'       => $request->twitter,
            'instagram'     => $request->instagram,
            'facebook'      => $request->facebook
        ]);

        if ($data) {
            return redirect()->route('admin.contactinfo.data')->with('success', 'Data berhasil ditambahkan, Silahkan cek == Master -> Frontend Web ==');
        }
    }

    public function updateContactInfo(Request $request, Contact_info $data)
    {
        $this->authorize('update', Contact_info::class);

        $userUpdate = Auth::user()->slug;
        $data = Contact_info::findOrFail($data->id);

        $data->update([
            'slug_id'       => $request->slug_id,
            'address'       => $request->address,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'wa'            => $request->wa,
            'twitter'       => $request->twitter,
            'instagram'     => $request->instagram,
            'facebook'      => $request->facebook
        ]);

        if ($data) {
            return redirect()->route('admin.contactinfo.data', $userUpdate)->with('success', 'Data updated successfully');
        }
    }

    public function destroyContactInfo(Contact_info $contactInfo)
    {
        $this->authorize('delete', Contact_info::class);

        $contactInfo->find($contactInfo->id)->all();
        $username = $contactInfo['username_id'];

        $contactInfo->delete();

        if ($contactInfo) {
            return redirect()->route('admin.contactinfo.data', $username)->with('success', 'Data deleted successfully');
        }
    }
}
