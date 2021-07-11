<?php
/*
|--------------------------------------------------------------------------
| @author: Indry Sefviana | github @indrysfa
|--------------------------------------------------------------------------
*/
namespace App\Policies;

use App\Models\Story;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StoryPolicy
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
        return in_array($user->role, ['admin', 'user']);
    }

    public function update(User $user)
    {
        return in_array($user->role, ['admin', 'user']);
    }

    public function delete(User $user)
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, Story $story)
    {
        //
    }

    public function forceDelete(User $user, Story $story)
    {
        //
    }
}
