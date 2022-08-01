<?php

use App\Http\Controllers\Core\ContactController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::resource('/contacts', ContactController::class)->except('show', 'edit', 'update', 'destroy');
    Route::get('/contacts/{contacts}/destroy', [ContactController::class, 'destroy'])->name('contacts.destroy');

});
