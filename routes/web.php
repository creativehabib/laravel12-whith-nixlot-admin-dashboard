<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/','welcome');

Auth::routes();

Route::group(['prefix' => '/dashboard', 'middleware' => 'auth'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Role route
    Route::resource('roles', RoleController::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
