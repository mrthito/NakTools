<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Staff\CategoryController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\DepartmentController;
use App\Http\Controllers\Staff\DeveloperController;
use App\Http\Controllers\Staff\EscalationController;
use App\Http\Controllers\Staff\FeedbackController;
use App\Http\Controllers\Staff\KycController;
use App\Http\Controllers\Staff\MyTimelineController;
use App\Http\Controllers\Staff\NoticeboardController;
use App\Http\Controllers\Staff\RechargeController;
use App\Http\Controllers\Staff\ReportController;
use App\Http\Controllers\Staff\RoleAssignmentController;
use App\Http\Controllers\Staff\ShipmentController;
use App\Http\Controllers\Staff\UserController;
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

Route::prefix('kyc')->name('kyc.')->group(function () {
    Route::resource('kyc-docs', KycController::class); //check-docs
    Route::get('kyc-docs/check-docs', [KycController::class, 'checkDocs'])->name('check-docs');
    Route::resource('shipments', ShipmentController::class);
    Route::get('shipments/track', [KycController::class, 'track'])->name('shipments.track');
    Route::resource('escalations', EscalationController::class);
    Route::resource('role-assignments', RoleAssignmentController::class);
    Route::resource('feedbacks', FeedbackController::class);
    Route::resource('users', UserController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('developers', DeveloperController::class);
    Route::resource('noticeboards', NoticeboardController::class);
    Route::resource('timelines', MyTimelineController::class);
    Route::resource('reports', ReportController::class);
    Route::controller(RechargeController::class)->prefix('recharges')->name('recharges.')->group(function () {
        Route::get('/new', 'new')->name('new');
        Route::get('/manual', 'manual')->name('manual');
        Route::get('/po', 'po')->name('po');
        Route::get('/histories', 'histories')->name('histories');
    });
});

// Route::resource('couriers', CourierController::class);

// Route::resource('coupons', CouponController::class);

// Route::resource('analytics', AnalyticsController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
