<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoanApplicationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->name('dashboard.')->group( function () {
    Route::get('/list-application', [LoanApplicationController::class, 'index'])->name('list-application');
    Route::get('/form-application', [LoanApplicationController::class, 'create'])->name('form-application');
    Route::post('/form-application', [LoanApplicationController::class, 'store'])->name('form-store');
    Route::get('/loan/{id}/offer', [LoanApplicationController::class, 'offer'])->name('loan-offer');
    Route::post('/loan', [LoanApplicationController::class, 'storeOffer'])->name('store-offer');
});

require __DIR__.'/auth.php';
