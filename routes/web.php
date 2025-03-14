<?php

use App\Http\Controllers\FontPageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/','welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Pages route e.g. [about,contact,etc]
Route::get('{slug}', FontPageController::class)->name('page');
