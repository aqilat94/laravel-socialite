<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('auth/google', [App\Http\Controllers\SocialiteController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\SocialiteController::class, 'handleGoogleCallback']);

Route::get('login/{provider}', [App\Http\Controllers\SocialiteController::class, 'redirectToProvider']);
Route::get('{provider}/callback', [App\Http\Controllers\SocialiteController::class, 'handleProviderCallback']);


Route::get('auth/facebook', [App\Http\Controllers\SocialiteController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [App\Http\Controllers\SocialiteController::class, 'loginWithFacebook']);
