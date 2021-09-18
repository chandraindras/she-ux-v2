<?php

namespace App\Http\Controllers\V2\OAuth2;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Laravel\Socialite\Facades\Socialite;

class OAuthTestController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('oauth-test')->redirect();
    }

    public function callback()
    {
        $rapensiaUser = Socialite::driver('oauth-test')->stateless()->user();
        $user = User::where('email', '=', $rapensiaUser->email)->first();
        if ($user) {
            $user->update([
               'rapensia_user_id' => $rapensiaUser->id
            ]);
        } else {
            $user = User::create([
                'name' => $rapensiaUser->name,
                'email' => $rapensiaUser->email,
                'password' => null,
                'rapensia_user_id' => $rapensiaUser->id,
            ]);
        }
        auth()->login($user);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
