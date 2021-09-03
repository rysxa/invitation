<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Policies;

use App\Models\User;
use App\Models\Wish;
use Illuminate\Auth\Access\HandlesAuthorization;

class WishPolicy
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

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Wish  $wish
     * @return mixed
     */
    public function restore(User $user, Wish $wish)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Wish  $wish
     * @return mixed
     */
    public function forceDelete(User $user, Wish $wish)
    {
        //
    }
}
