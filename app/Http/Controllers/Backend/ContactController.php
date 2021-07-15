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
    public function index() //ok
    {
        $user = Auth::user()->username;
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $contact = User::join('contacts', 'users.username', '=', 'contacts.username_id')->get();
        } else {
            $contact = User::join('contacts', 'users.username', '=', 'contacts.username_id')
            ->where('username_id', '=', $user)
            ->get();
        }
        return view('admin.contact', compact('user', 'role', 'contact'));
    }

    public function updateContact(Request $request, Contact $data)
    {
        $this->authorize('update', Contact::class);

        $userUpdate = Auth::user()->username;
        $data = Contact::findOrFail($data->id);

        $data->update([
            'username_id'   => $request->username_id,
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone
        ]);

        if ($data) {
            return redirect()->route('admin.contact.data', $userUpdate)->with('success', 'Data updated successfully');
        }
    }

    public function destroyContact(Contact $contact)
    {
        $this->authorize('delete', Contact::class);

        $contact->find($contact->id)->all();
        $username = $contact['username_id'];

        $contact->delete();

        if ($contact) {
            return redirect()->route('admin.contact.data', $username)->with('success', 'Data deleted successfully');
        }
    }

    public function indexContactInfo($username) //ok
    {
        $user = Auth::user()->username;
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $contact_info = User::join('contact_infos', 'users.username', '=', 'contact_infos.username_id')->get();
        } else {
            $contact_info = User::join('contact_infos', 'users.username', '=', 'contact_infos.username_id')
            ->where('username_id', '=', $user)
            ->get();
        }
        return view('admin.contact-info', compact('user', 'role', 'contact_info'));
    }

    public function addContactInfo($username) //ok
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $user = User::where('username', $username)->first();
        } else {
            $user = Auth::user()->username;
        }
        return view('admin.contact-info-add', compact('user', 'role'));
    }

    public function createContactInfo(Request $request, $user) //ok
    {
        // privilege
        $this->authorize('create', Contact_info::class);
        $user = Auth::user()->username;
        $this->validate($request, [
            'address'   => 'required',
            'phone'     => 'required',
            'email'     => 'required',
            'wa'        => 'required'
        ]);

        $data = Contact_info::create([
            'username_id'   => $request->username_id,
            'address'       => $request->address,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'wa'            => $request->wa,
            'twitter'       => $request->twitter,
            'instagram'     => $request->instagram,
            'facebook'      => $request->facebook
        ]);

        if ($data) {
            return redirect()->route('admin.contactinfo.data', $user)->with('success', 'Data berhasil ditambahkan, Silahkan cek == Master -> Frontend Web ==');
        }
    }

    public function updateContactInfo(Request $request, Contact_info $data) //ok
    {
        $this->authorize('update', Contact_info::class);

        $userUpdate = Auth::user()->username;
        $data = Contact_info::findOrFail($data->id);

        $data->update([
            'username_id'   => $request->username_id,
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

    public function destroyContactInfo(Contact_info $contactInfo) //ok
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
