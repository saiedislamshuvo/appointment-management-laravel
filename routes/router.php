<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('src.pages.dashboard.index');
    })->name('dashboard');
});

require __DIR__.'/appearance.php';
require __DIR__.'/contact.php';
require __DIR__.'/user.php';
require __DIR__.'/auth.php';

require __DIR__.'/appointment.php';
