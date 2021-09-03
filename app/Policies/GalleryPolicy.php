<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Policies;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GalleryPolicy
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
        return in_array($user->role_id, [1, 2]);
    }

    public function update(User $user)
    {
        return in_array($user->role_id, [1, 2]);
    }

    public function delete(User $user)
    {
        return $user->role_id === 1;
    }

    public function restore(User $user, Gallery $gallery)
    {
        //
    }

    public function forceDelete(User $user, Gallery $gallery)
    {
        //
    }
}
