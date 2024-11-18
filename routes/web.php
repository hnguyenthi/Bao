<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/top', function () {
    return Inertia::render('Top');
})->name('top');
Route::get('/home', function () {
    return Inertia::render('Home');
})->name('home');
Route::get('/welcome', function () {
    return Inertia::render('Welcome');
})->name('home');
Route::get('/paidAnalysisDashboard', function () {
    return Inertia::render('PaidAnalysisDashboard');
})->name('paidAnalysisDashboard');
// Route::get('/report', function () {
//     return Inertia::render('Home');
// })->name('report');
Route::get('/premium', function () {
    return Inertia::render('Home');
})->name('premium');
Route::get('/news-archive', function () {
    return Inertia::render('Home');
})->name('news-archive');

    // ->middleware(['auth'])->name('top');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

