<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', HomeController::class)->name('home');

Route::controller(TrackController::class)->middleware(['auth', 'date'])->prefix('track')->name('track.')->group(function () {
    Route::post('task/update/{task}', 'updateTask')->name('task.update');
    Route::post('salat/update/{salat}', 'updateSalat')->name('salat.update');
    Route::post('salat/sunnah_rakat/update/{salat}', 'updateSunnahSalat')->name('salat.sunnah.update');
    Route::post('quran/update/{quran}', 'updateQuran')->name('quran.update');
});

Route::middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
