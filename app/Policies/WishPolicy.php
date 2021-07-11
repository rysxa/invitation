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
        return in_array($user->role, ['admin', 'user']);
    }

    public function view(User $user)
    {
        return $user->role === 'user';
    }

    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    public function update(User $user)
    {
        return $user->role === 'admin';
    }

    public function delete(User $user)
    {
        return $user->role === 'admin';
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
