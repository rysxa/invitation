<?php

namespace App\Policies;

use App\Models\Gallery_caption;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Gallery_captionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user)
    {
        return $user->role === 'admin';
    }

    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    public function update(User $user)
    {
        return in_array($user->role, ['admin', 'user']);
    }

    public function delete(User $user)
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, Gallery_caption $galleryCaption)
    {
        //
    }

    public function forceDelete(User $user, Gallery_caption $galleryCaption)
    {
        //
    }
}