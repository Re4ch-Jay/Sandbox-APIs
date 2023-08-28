<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $user = User::query()->where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'Unauthenticated',
                'message' => 'The provided credential is incorrect',
            ], 401);
        }

        $token = $user->createToken('myapp')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Account has been login',
            'token' => $token,
            'user' => new UserResource($user),
        ]);
    }

    public function destroy(Request $request) {

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Account has been logout',
            'token' => null,
            'user' => null,
        ]);
    }
}
