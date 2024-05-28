<?php

declare(strict_types=1);

use App\Http\Controllers\App\TestController;
use App\Http\Controllers\App\DashboardController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', [TestController::class, 'index']);
    Route::get('/dashboardTest', [DashboardController::class, 'index'])->name('app.dashboard')->middleware(['auth']);
});

require __DIR__ . '/app/ecommerce-api/settings-api.php';
require __DIR__ . '/app/auth.php';
