<?php

use App\Http\Controllers\Appointment\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::resource('/appointments', AppointmentController::class);
    Route::get('/appointments/{appointment}/visited/{status?}', [AppointmentController::class, 'visited'])->name('appointments.visited');

});
