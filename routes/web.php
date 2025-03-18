<?php

use App\Http\Controllers\GuestBookEntryController;
use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::get('info', InfoController::class)->name('info');

    Route::resource('guest-book', GuestBookEntryController::class)->except('show');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
