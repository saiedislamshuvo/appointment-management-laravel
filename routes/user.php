<?php

use App\Http\Controllers\Core\UserController;
use App\Http\Controllers\Core\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/user/update', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::post('/user/change-password', [ProfileController::class, 'changePassword'])->name('user.change-password');
    
    Route::get('/users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    Route::resource('/users', UserController::class)->except('show', 'edit', 'update', 'destroy');

});
