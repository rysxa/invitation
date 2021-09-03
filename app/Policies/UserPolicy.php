<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role_id, [1, 2]);
    }

    public function view(User $user)
    {
        return in_array($user->role_id, [1]);
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

    public function restore(User $user)
    {
        return $user->role_id === 1;
    }

    public function forceDelete(User $user)
    {
        return $user->role_id === 1;
    }
}
