<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminRegistationController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgetController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;

Route::name('admin.')->prefix('admin')->group(function () {
    

        Route::middleware(['AdminAuth', 'VerifiedAdminEmail'])->group(function () {
            Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
            Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        });



    Route::name('package.')->prefix('dashboard')->group(function () {
        Route::middleware(['AdminAuth', 'VerifiedAdminEmail'])->group(function () {
            Route::get('/', [DashboardController::class, 'addpackage'])->name('create');
            Route::post('submit', [DashboardController::class, 'package_submit'])->name('submit');

        });
    });


});
