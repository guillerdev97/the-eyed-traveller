<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // register 
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
            'msg' => 'User registered',
            'data' =>  $newUser
        ], 200);
    }

    // login 
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

    // logout 
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

    // delete
    public function delete()
    {
        $user = auth()->user();

        $images = $user->images;

        foreach($images as $image) {
            $image->delete();
        }

        $user->delete();

        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => 1,
            'msg' => "Deleted user",
            'data' => $user,
            'images' => $images
        ], 200);
    }

    // update
    public function update(Request $request, $id)
    {
        $user = auth()->user();

        $userUpdated = User::all()
            ->find($id);

        $userUpdated->name = $request->name;
        $userUpdated->email = $request->email;
        $userUpdated->password = Hash::make($request->password);

        $userUpdated->update();


        return response()->json([
            'status' => 1,
            'msg' => 'Student updated',
            'data' => $userUpdated
        ], 200);
    }

    // user profile
    public function profile()
    {
        $user = auth()->user();

        return response()->json([
            'status' => 1,
            'msg' => 'Student updated',
            'data' => $user
        ], 200);
    }
}
