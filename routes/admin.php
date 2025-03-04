<?php

use App\Http\Controllers\Admin\AdminSalatController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware(['auth', 'admin', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', function () {

        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Salat routes
    Route::controller(AdminSalatController::class)->prefix('salat')->name('salat.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::delete('/store/{salat}', 'destroy')->name('destroy');
    });
});

