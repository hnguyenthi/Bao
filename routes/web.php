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

Route::get('/paidAnalysisDashboard', function () {
    return Inertia::render('PaidAnalysisDashboard');
})->name('paidAnalysisDashboard');

Route::get('/paidAnalysisPropertyStatus', function () {
    return Inertia::render('PaidAnalysisIncomeStatus');
})->name('paidAnalysisPropertyStatus');

Route::get('/paidAnalysisIncomeStatus', function () {
    return Inertia::render('PaidAnalysisIncomeStatus');
})->name('paidAnalysisIncomeStatus');

Route::get('/paidAnalysisExpenseStatus', function () {
    return Inertia::render('PaidAnalysisIncomeStatus');
})->name('paidAnalysisExpenseStatus');

Route::get('/paidAnnualPaymentInformation', function () {
    return Inertia::render('PaidAnalysisIncomeStatus');
})->name('paidAnnualPaymentInformation');

Route::get('/paidAnnualBalanceInformation', function () {
    return Inertia::render('PaidAnalysisIncomeStatus');
})->name('paidAnnualBalanceInformation');

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

