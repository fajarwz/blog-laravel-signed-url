<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function sendResetPasswordLink()
    {
        $userId = 4;
        $timeLimit = now()->addMinutes(60);

        $link = URL::temporarySignedRoute(
            'reset-password.index',
            $timeLimit,
            ['userId' => $userId],
        );
        // $link = URL::signedRoute('reset-password.index', ['userId' => 4]);

        // put to cache for one time signed url
        Cache::put('reset-password-' . $userId, $link, $timeLimit);

        // you may want to send the link to the user's email
        // here let's print the link so we know it's working
        dd($link);
    }

    public function index(Request $request)
    {
        // if this is not the first time, return 403
        $signedUrlCacheKey = 'reset-password-' . $request->userId;
        if (!Cache::has($signedUrlCacheKey)) {
            return abort(403, 'INVALID SIGNATURE');
        }

        // you may want to display the reset password page here
        // here I will display the user id so we know we can get 
        // the parameter in the link
        dd('You are a user with ID ' . $request->userId);
    }

    public function resetPassword(Request $request)
    {
        $signedUrlCacheKey = 'reset-password-' . $request->userId;
        if (!Cache::has($signedUrlCacheKey)) {
            return abort(403, 'INVALID SIGNATURE');
        }
        
        // reset password logic here...
        
        // remove the url from cache after successful reset
        Cache::forget($signedUrlCacheKey);

        dd('password reset was successful');
    }
}
