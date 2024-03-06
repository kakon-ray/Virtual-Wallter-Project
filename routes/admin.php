<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminRegistationController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgetController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Dashboard\PackageController;

Route::name('admin.')->prefix('admin')->group(function () {
    

        Route::middleware(['AdminAuth', 'VerifiedAdminEmail'])->group(function () {
            Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
            Route::get('logout', [LoginController::class, 'logout'])->name('logout');
            Route::get('role', [DashboardController::class, 'admin_role'])->name('role');
            Route::get('role/accepted', [DashboardController::class, 'admin_role_accepted'])->name('role.accepted');

        });



    Route::name('package.')->prefix('package')->group(function () {
        Route::middleware(['AdminAuth', 'VerifiedAdminEmail'])->group(function () {
            Route::get('/create', [PackageController::class, 'addpackage'])->name('create');
            Route::get('/manage', [PackageController::class, 'package_manage'])->name('manage');
            Route::post('submit', [PackageController::class, 'package_submit'])->name('submit');
            Route::get('delete', [PackageController::class, 'delete_package_submit']);
        });
    });


});
