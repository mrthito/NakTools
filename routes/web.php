<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\KycController;
use App\Models\Common\User;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::name('u.')->prefix('dashboard')->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard.index');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('kyc', KycController::class);
    });
});

Route::get('/', function () {
    // if (Auth::check()) {
    //     Auth::logout();
    // }
    // User::where('email', 'admin@log.in')->update([
    //     'password' => bcrypt('12345678')
    // ]);
})->name('home');
