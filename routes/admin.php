<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware(['auth', 'admin', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', function () {

        return Inertia::render('Dashboard');
    })->name('dashboard');
});

