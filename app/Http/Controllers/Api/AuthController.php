<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:7']
        ]);

        if (!auth()->attempt($validated)) {
            return response()->json([
                'message' => "Invalid Credentials",
                'errors' => [
                    'password' => [
                        'Invalid credentials'
                    ]
                ]
            ], 422);
        }
        return response()->json([
            'message' => "Signed In Successfully",
            'access_token' => $request->user()->createToken('auth-token')->plainTextToken,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'data' => "",
            'message' => "Logged Out Successfully"
        ]);
    }
}
