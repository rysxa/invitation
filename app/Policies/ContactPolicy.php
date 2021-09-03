<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Policies;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role_id, [1, 2]);
    }

    public function view(User $user)
    {
        return $user->role_id === 2;
    }

    public function create(User $user)
    {
        return $user->role_id === 1;
    }

    public function update(User $user)
    {
        return $user->role_id === 1;
    }

    public function delete(User $user)
    {
        return $user->role_id === 1;
    }

    public function restore(User $user, Contact $contact)
    {
        //
    }

    public function forceDelete(User $user, Contact $contact)
    {
        //
    }
}
