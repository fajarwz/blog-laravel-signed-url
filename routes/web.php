<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('reset-password/send-link', [UserController::class, 'sendResetPasswordLink'])
    ->name('reset-password.send-link');

Route::middleware('signed')->get('reset-password/{userId}', [UserController::class, 'index'])
    ->name('reset-password.index');
