<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Otp;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

use App\Mail\OTPMail;


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

        $generated_otp = rand(100000, 999999);
        Cache::put('otp_'. $request->email, $generated_otp, now()->addMinutes(5));
        Mail::to($request->email)->send(new OTPMail($generated_otp));

        // otp
        $user->otp()->create([
            'code' => $generated_otp,
            'has_used' => false,
            'expires_at' => now()->addMinutes(5),
        ]);

        // $data = new UserResource($user);
        return response()->json([
            'data' => new UserResource($user),
            'message' => 'User created successfully, please verify your email',
            'status' => 'success',
        ], 201);
    }

    public function userLogin(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|string',
        ]);
    }
}
