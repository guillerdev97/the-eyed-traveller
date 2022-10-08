<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // user - register function
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $newUser = new User();

        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);

        $newUser->save();

        return response()->json([
            'status' => 1,
            'msg' => 'Student created',
            'data' =>  $newUser
        ], 200);
    }

    // user - log in function
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if (isset($user->id)) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'status' => 1,
                    'msg' => 'User is logged in',
                    'data' => $user,
                    'access_token' => $token
                ], 200);
            }

            return response()->json([
                'status' => 0,
                'msg' => 'Incorrect password'
            ], 404);
        }

        return response()->json([
            'status' => 0,
            'msg' => 'User no registered'
        ], 404);
    }

    // user - log out function
    public function logout()
    {
        $user = auth()->user();

        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => 1,
            'msg' => "User is logged out",
            'data' => $user,
        ], 200);
    }
}
