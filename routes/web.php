<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tweets', [TweetController::class, 'index'])->name('tweets.index');
Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store')->middleware('auth');
