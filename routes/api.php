<?php

use App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Api\Landing;
use App\Http\Controllers\Api\OAuth;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', Auth\LoginController::class)->name('api.login');
Route::post('/auth/register', Auth\RegisterController::class)->name('api.register');

Route::prefix('/oauth')->name('api.oauth.')->group(static function(): void {
    Route::prefix('/google')->name('google.')->group(static function(): void {
        Route::get('/redirect', [OAuth\GoogleController::class, 'redirect'])->name('redirect');
        Route::get('/callback', [OAuth\GoogleController::class, 'callback'])->name('callback');
    });

    Route::prefix('/microsoft')->name('microsoft.')->group(static function(): void {
        Route::get('/redirect', [OAuth\MicrosoftController::class, 'redirect'])->name('redirect');
        Route::get('/callback', [OAuth\MicrosoftController::class, 'callback'])->name('callback');
    });
});

Route::post('/forgot-password', [Auth\ForgotPasswordController::class, 'sendResetLink'])->name('api.forgot-password');
Route::post('/reset-password', [Auth\ForgotPasswordController::class, 'resetPassword'])->name('api.reset-password');

Route::prefix('/landing')->name('api.landing.')->group(static function(): void {
    Route::prefix('/home')->controller(Landing\HomeController::class)->group(static function(): void {
        Route::get('/statistics', 'statistics')->name('statistics');
        Route::get('/incoming-events', 'incomingEvents')->name('incoming-events');
        Route::get('/recommended-shops', 'recommendedShops')->name('recommended-shops');
        Route::get('/popular-products', 'popularProducts')->name('popular-products');
    });

    Route::prefix('/businesses')->controller(Landing\BusinessController::class)->group(static function(): void {
        Route::get('/', 'index')->name('list-business');
        Route::get('/{slug}', 'show')->name('detail-business');
        Route::get('/{slug}/products', 'products')->name('business-products');
    });
});

Route::middleware('auth:sanctum')->group(static function(): void {
    Route::delete('/auth/logout', Auth\LogoutController::class)->name('api.logout');

    Route::middleware('verified.email')->prefix('/email')->name('verification.')->group(static function(): void {
        Route::controller(Auth\VerificationController::class)->group(static function(): void {
            Route::post('/verification-notification', 'resend')->name('send');
            Route::get('/verify/{id}/{hash}', 'verify')->name('verify');
        });
    });
});
