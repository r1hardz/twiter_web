<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect root to /tweets
Route::get('/', function () {
    return redirect('/tweets');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Add the routes for TweetController
Route::get('/tweets', [App\Http\Controllers\TweetController::class, 'index'])->name('tweets.index');
Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
