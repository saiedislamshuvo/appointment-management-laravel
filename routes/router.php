<?php

use App\Http\Controllers\Core\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/appearance.php';
require __DIR__.'/contact.php';
require __DIR__.'/user.php';
require __DIR__.'/auth.php';

require __DIR__.'/appointment.php';
