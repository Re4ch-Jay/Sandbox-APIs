<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return UserResource::collection(User::query()->get());
    }

    /**
     *  @return UserResource 
     * show specific user without eager loading: shares, likes and comments.
     */
    public function show(User $user) {

        return new UserResource($user);
    }

    /**
     *  @return UserResource 
     * show specific user with eager loading: posts.
     */
    public function posts(User $user) {

        $user->load('posts');

        return new UserResource($user);
    }

    /**
     *  @return UserResource 
     * show specific user with eager loading: shares.
     */
    public function shares(User $user) {

        $user->load('shares');

        return new UserResource($user);
    }

    /**
     *  @return UserResource 
     * show specific user with eager loading: likes.
     */
    public function likes(User $user) {

        $user->load('likes');
        return new UserResource($user);
    }

    /**
     *  @return UserResource 
     * show specific user with eager loading: comments.
     */
    public function comments(User $user) {

        $user->load('comments');
        return new UserResource($user);
    }
}
