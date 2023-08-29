<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Like;
use App\Models\User;

class LikePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Like $like) {
        return $user->id === $like->user_id;
    }

}
