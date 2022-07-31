<?php

use App\Http\Controllers\Appearance\AppearanceSettingController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    Route::get('/appearance/settings', [AppearanceSettingController::class, 'index'])->name('appearance.settings.index');
    Route::post('/appearance/settings/app-info/update', [AppearanceSettingController::class, 'appInfoUpdate'])->name('appearance.settings.app-info.update');
    Route::post('/appearance/settings/app-social/update', [AppearanceSettingController::class, 'appSocialUpdate'])->name('appearance.settings.app-social.update');
    Route::post('/appearance/settings/app-footer/update', [AppearanceSettingController::class, 'appFooterUpdate'])->name('appearance.settings.app-footer.update');
    Route::post('/appearance/settings/app-favicon/update', [AppearanceSettingController::class, 'appFaviconUpdate'])->name('appearance.settings.app-favicon.update');
    Route::post('/appearance/settings/app-logo/update', [AppearanceSettingController::class, 'appLogoUpdate'])->name('appearance.settings.app-logo.update');
    Route::post('/appearance/settings/app-footer-logo/update', [AppearanceSettingController::class, 'appFooterLogoUpdate'])->name('appearance.settings.app-footer-logo.update');

});
