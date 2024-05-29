<?php

use App\Http\Controllers\App\SettingsController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->prefix('api')->group(function () {
    Route::get('/settings', [SettingsController::class, 'settings_api']);
    Route::put('/settings/update', [SettingsController::class, 'update_settings_api']);
});
