<?php

use App\Http\Controllers\Core\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('src.pages.dashboard.index');
    })->name('dashboard');

    Route::resource('/contacts', ContactController::class)->except('show', 'edit', 'update', 'destroy');
    Route::get('/contacts/{contacts}/destroy', [ContactController::class, 'destroy'])->name('contacts.destroy');

});

require __DIR__.'/appearance.php';
require __DIR__.'/user.php';
require __DIR__.'/auth.php';
