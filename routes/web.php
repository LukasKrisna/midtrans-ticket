<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\MidtransPaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Api\VerifyPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyCsrfToken;

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

// Route::withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])->group(function () {
//     Route::post('/process-payment', [MidtransPaymentController::class, '__invoke']);
// });

Route::post('/process-payment', [MidtransPaymentController::class, '__invoke'])->name('process-payment');
Route::post('/verify-payment', [VerifyPaymentController::class, '__invoke']);


Route::get('/', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
require __DIR__ . '/auth.php';
