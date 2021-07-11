<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
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

    public function restore(User $user, Event $event)
    {
        //
    }

    public function forceDelete(User $user)
    {
        return $user->role === 'admin';
    }
}
