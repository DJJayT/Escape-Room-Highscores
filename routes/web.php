<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Default-Route - Homepage
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

//Auth Routes
Route::group([
    'middleware' => [
        'guest'
    ]
], function () {
    Route::get('login', [LoginController::class, 'index'])
        ->name('login');
    Route::post('login', [LoginController::class, 'postLogin'])
        ->name('postLogin');
    Route::get('login-required', [LoginController::class, 'loginRequired'])
        ->name('login-required');


    Route::get('forgot-password', [LoginController::class, 'forgottenPassword'])
        ->name('password.request');
    Route::post('forgot-password', [LoginController::class, 'requestPasswordEmail'])
        ->name('password.email');
    Route::get('reset-password/{token}', [LoginController::class, 'resetPassword'])
        ->name('password.reset');
    Route::post('reset-password', [LoginController::class, 'postResetPassword'])
        ->name('password.update');
});

Route::get('logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

//Routes for all authenticated users
Route::group(['middleware' => ['auth']], function () {
    Route::get('test', [LoginController::class, 'forgottenPassword'])
        ->name('test');

    Route::group(['name' => 'messages', 'prefix' => 'message'], function () {
        Route::get('create', [MessageController::class, 'indexNewMessage'])
            ->name('createNewMessage');
        Route::post('create', [MessageController::class, 'create'])
            ->name('createMessage');

        Route::get('all', [MessageController::class, 'index'])
            ->name('showAllMessages');

        Route::get('messages/{id}/edit', [MessageController::class, 'editMessageView'])
            ->name('editMessage');
        Route::post('messages/{id}/edit', [MessageController::class, 'editMessage'])
            ->name('editMessage');

        Route::get('messages/{id}/delete', [MessageController::class, 'deleteMessage'])
            ->name('deleteMessage');


        Route::get('messages/{id}', [MessageController::class, 'show'])
            ->name('showMessage');
        Route::post('messages', [MessageController::class, 'store'])
            ->name('storeMessage');
        Route::delete('messages/{id}', [MessageController::class, 'destroy'])
            ->name('destroyMessage');
    });

    Route::group(['name' => 'badge', 'prefix' => 'badge'], function () {
        Route::get('create', [BadgeController::class, 'createBadgeView'])
            ->name('createBadge');
        Route::post('create', [BadgeController::class, 'createBadge'])
            ->name('createBadge');
    });


});
