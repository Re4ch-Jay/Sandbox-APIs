<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(AuthRequest $request) {
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('myapp')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Account has been registered',
            'token' => $token,
            'user' => new UserResource($user),
        ]);
    }
}
