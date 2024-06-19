<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('order', OrderController::class);
    Route::post('order/{order:order_code}/confirm', [OrderController::class, 'confirm'])->name('order.confirm');
    Route::post('order/{order:order_code}/finished', [OrderController::class, 'finished'])->name('order.finished');
    Route::post('order/{order:order_code}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');
    Route::resource('field', FieldController::class);
    Route::resource('feedback', FeedbackController::class)->except('store');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
