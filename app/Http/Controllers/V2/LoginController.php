<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showFormLogin()
    {
        if (auth()->check()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        return view('v2.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($request->only(['email', 'password']))) {
            dd('aaaaaaaa');
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        return redirect()
            ->back()
            ->withInput()
            ->withErrors(["Invalid email or password"]);
    }
}
