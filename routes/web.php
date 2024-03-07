<?php

use App\Http\Controllers\User\Dashboard\DashboardController;
use App\Http\Controllers\User\Dashboard\StripePementController;
use App\Http\Controllers\User\UserGuest\UserGuestController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserGuestController::class, 'home'])->name('home');

Route::name('user.')->prefix('user')->group(function () {

    Route::middleware('auth','verified')->group(function () {

        Route::get('/stripe', [StripePementController::class, 'stripe'])->name('dashboard');
        Route::post('/make-pement', [StripePementController::class, 'make_pement'])->name('make.pement');
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
 
    });
    
});

require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';
