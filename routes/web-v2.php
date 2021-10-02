<?php

use App\Http\Controllers\SwotController;
use App\Http\Controllers\V2\AboutUsController;
use App\Http\Controllers\V2\LoginController;
use App\Http\Controllers\V2\OAuth2\OAuthTestController;
use App\Http\Controllers\V2\OAuth2\RapensiaOAuthController;
use App\Http\Controllers\V2\Preview\ComparisonMatrixPreviewController;
use App\Http\Controllers\V2\Preview\LeanCanvasPreviewController;
use App\Http\Controllers\V2\Preview\ProjectStatementPreviewController;
use App\Http\Controllers\V2\Preview\SwotPreviewController;
use App\Http\Controllers\V2\Preview\UserPersonaPreviewController;
use App\Http\Controllers\V2\Preview\UserStoryPreviewController;
use App\Http\Controllers\V2\SwotPdfController;
use Illuminate\Support\Facades\Route;

Route::get('backdoor/login', [LoginController::class, 'showFormLogin'])->name('backdoor.login');
Route::post('backdoor/login', [LoginController::class, 'login'])->name('backdoor.login');

Route::get('oauth/redirect', [OAuthTestController::class, 'redirect'])->name('oauth.redirect');
Route::get('oauth/callback', [OAuthTestController::class, 'callback'])->name('oauth.callback');

Route::get('rapensia/oauth/redirect', [RapensiaOAuthController::class, 'redirect'])->name('rapensia.oauth.redirect');
Route::get('rapensia/oauth/callback', [RapensiaOAuthController::class, 'callback'])->name('rapensia.oauth.callback');
Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('swot-pdf', [SwotController::class, 'cetak'])->name('swot-pdf');

Route::middleware(['auth'])->group(function () {
    Route::get('preview/swot', [SwotPreviewController::class, 'index'])->name('preview.swot');
    Route::get('preview/comparison-matrix', [ComparisonMatrixPreviewController::class, 'index'])->name('preview.comparison-matrix');
    Route::get('preview/lean-canvas', [LeanCanvasPreviewController::class, 'index'])->name('preview.lean-canvas');
    Route::get('preview/project-statement', [ProjectStatementPreviewController::class, 'index'])->name('preview.project-statement');
    Route::get('preview/user-persona', [UserPersonaPreviewController::class, 'index'])->name('preview.user-persona');
    Route::get('preview/user-story', [UserStoryPreviewController::class, 'index'])->name('preview.user-story');
});
