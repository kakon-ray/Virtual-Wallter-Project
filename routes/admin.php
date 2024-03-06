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



    Route::name('package.')->prefix('package')->group(function () {
        Route::middleware(['AdminAuth', 'VerifiedAdminEmail'])->group(function () {
            Route::get('/create', [DashboardController::class, 'addpackage'])->name('create');
            Route::get('/manage', [DashboardController::class, 'package_manage'])->name('manage');
            Route::post('submit', [DashboardController::class, 'package_submit'])->name('submit');
            Route::get('delete', [DashboardController::class, 'delete_package_submit']);
        });
    });


});
