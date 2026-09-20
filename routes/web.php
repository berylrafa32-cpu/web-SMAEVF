<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonialController;

Route::get('/', [TestimonialController::class, 'index'])->name('home');
Route::post('/testimoni', [TestimonialController::class, 'store'])->name('testimoni.store');
Route::delete('/testimoni/{id}', [TestimonialController::class, 'destroy'])->name('testimoni.destroy');