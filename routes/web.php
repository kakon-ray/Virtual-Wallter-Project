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
       
        
        Route::get('/myorder', [DashboardController::class, 'myorder'])->name('myorder');
        Route::get('/dashboard', [DashboardController::class, 'information'])->name('dashboard');
        Route::post('/information/submit', [DashboardController::class, 'information_submit'])->name('information.submit');
        Route::get('/passport/nationidcard', [DashboardController::class, 'passport_national_id'])->name('passport.nationidcard');
        
        Route::post('/passport/submit', [DashboardController::class, 'passport_submit'])->name('passport.submit');
        Route::post('/nationid/submit', [DashboardController::class, 'nationalid_submit'])->name('nationalid.submit');
 
    
    });
    
});

require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';
