<?php

use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', DashboardController::class)->name('dashboard');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

// Profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

// Profile
Route::get('profile/security', [ProfileController::class, 'changePassword'])->name('profile.password.change');
Route::put('profile/security', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

// Backend Routes
Route::resource('backups', BackupController::class)->only(['index', 'store', 'destroy']);
Route::get('backups/{file_name}', [BackupController::class, 'download'])->name('backups.download');
Route::delete('backups', [BackupController::class, 'clean'])->name('backups.clean');
Route::delete('cache',[BackupController::class, 'cache'])->name('cache.clear');
