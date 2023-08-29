<?php

namespace App\Policies;

use App\Models\Share;
use App\Models\User;

class SharePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Share $share) {
        return $user->id === $share->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user,  Share $share) {
        return $this->update($user, $share);
    }
}
