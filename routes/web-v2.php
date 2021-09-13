<?php

use App\Http\Controllers\V2\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('backdoor/login', [LoginController::class, 'showFormLogin'])->name('backdoor.login');
Route::post('backdoor/login', [LoginController::class, 'login'])->name('backdoor.login');
Route::middleware(['auth'])->group(function ()
{

});
