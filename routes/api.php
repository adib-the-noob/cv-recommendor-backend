<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserOnBoardingController;

Route::get('/test', function () {
    return response()->json(['message' => 'Hello World!']);
});

Route::post('/create-user', [UserOnBoardingController::class, 'createUser']);
