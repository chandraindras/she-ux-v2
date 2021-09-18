<?php

use App\Http\Controllers\V2\LoginController;
use App\Http\Controllers\V2\OAuth2\OAuthTestController;
use Illuminate\Support\Facades\Route;

Route::get('backdoor/login', [LoginController::class, 'showFormLogin'])->name('backdoor.login');
Route::post('backdoor/login', [LoginController::class, 'login'])->name('backdoor.login');

Route::get('oauth/redirect', [OAuthTestController::class, 'redirect'])->name('oauth.redirect');
Route::get('oauth/callback', [OAuthTestController::class, 'callback'])->name('oauth.callback');

//Route::get('rapensia/oauth/redirect', [OAuthTestController::class, 'redirect']);
//Route::get('rapensia/oauth/callback', [OAuthTestController::class, 'callback']);

Route::middleware(['auth'])->group(function ()
{

});
