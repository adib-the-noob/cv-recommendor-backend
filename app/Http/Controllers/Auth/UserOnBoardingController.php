<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Otp;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserOnBoardingController extends Controller
{
    public function createUser(Request $request)
    {
        // data validation
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        if (User::where('email', $request->email)->exists()) {
            return response()->json(['message' => 'Email already exists'], 400);
        }
        
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // generate OTP
        $user->otp()->create([
            'user_id' => $user->id,
            'code' => rand(100000, 999999),
            'has_used' => false,
            'expires_at' => now()->addMinutes(5),
        ]);

        $data = new UserResource($user);
        return $data->response()->setStatusCode(201);
    }
}
