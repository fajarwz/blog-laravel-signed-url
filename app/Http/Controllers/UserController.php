<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function sendResetPasswordLink()
    {
        $link = URL::temporarySignedRoute(
            'reset-password.index',
            now()->addMinutes(60),
            ['userId' => 4],
        );
        // $link = URL::signedRoute('reset-password.index', ['userId' => 4]);

        // you may want to send the link to the user's email
        // here let's print the link so we know it's working
        dd($link);
    }

    public function index(Request $request)
    {
        // you may want to display the reset password page here
        // here I will display the user id so we know we can get 
        // the parameter in the link
        dd('You are a user with ID ' . $request->userId);
    }
}
