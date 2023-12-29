<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Superadmin\AnalyticsController;
use App\Http\Controllers\Superadmin\CouponController;
use App\Http\Controllers\Superadmin\CourierController;
use App\Http\Controllers\Superadmin\DashboardController;
use App\Http\Controllers\Superadmin\ImportExportController;
use App\Http\Controllers\Superadmin\KycDocsController;
use App\Http\Controllers\Superadmin\MarketingController;
use App\Http\Controllers\Superadmin\PermissionController;
use App\Http\Controllers\Superadmin\PlanController;
use App\Http\Controllers\Superadmin\RoleController;
use App\Http\Controllers\Superadmin\StaffController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', DashboardController::class)->name('dashboard');

Route::resource('staffs', StaffController::class);
Route::post('staffs/{staff}/impersonate', [StaffController::class, 'impersonate'])->name('staffs.impersonate');
Route::delete('staffs/impersonate/logout', [StaffController::class, 'impersonateDestroy'])->name('staffs.impersonate.destroy');

Route::resource('plans', PlanController::class);
Route::put('plans/{plan}/features', [PlanController::class, 'features'])->name('plans.features');

Route::resource('couriers', CourierController::class);

Route::resource('coupons', CouponController::class);

Route::resource('analytics', AnalyticsController::class);

Route::resource('marketing', MarketingController::class);

Route::resource('import-export', ImportExportController::class)->only(['index', 'store']);
Route::get('import-export/sample/{for}/{extension}', [ImportExportController::class, 'sample'])->name('import-export.sample');

Route::resource('roles', RoleController::class);
Route::prefix('roles/{role}')->name('roles.')->group(function () {
    Route::resource('permissions', PermissionController::class);
});

Route::resource('kyc-docs', KycDocsController::class);
Route::post('/kyc-docs/getStates', [KycDocsController::class, 'getStates'])->name('kyc-docs.getStates');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
