<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth', 'verified', 'date'])->group(function () {
    Route::controller(TrackController::class)->prefix('track')->name('track.')->group(function () {
        Route::post('task/update/{task}', 'updateTask')->name('task.update');
        Route::post('salat/update/{salat}', 'updateSalat')->name('salat.update');
        Route::post('salat/sunnah_rakat/update/{salat}', 'updateSunnahSalat')->name('salat.sunnah.update');
        Route::post('quran/update', 'updateQuran')->name('quran.update');
    });

    Route::controller(ReportController::class)->prefix('report')->name('report.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
});


Route::middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
