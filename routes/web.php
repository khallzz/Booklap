<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.user.home');
})->name('home');
Route::get('/field', function () {
    return view('pages.user.field');
});
Route::get('/about', function () {
    return view('pages.user.about');
})->name('about');

Route::get('book', [BookingController::class, 'index'])->name('book');
Route::get('book/schedule', [BookingController::class, 'schedulePage'])->middleware('auth')->name('book.schedule.index');
Route::get('order', [BookingController::class, 'orderIndex'])->name('order.index');
Route::get('order/show', function () {
    return view('pages.user.order-detail');
})->name('order.show');
// Route::get('order/{order}', [BookingController::class, 'orderDetail'])->name('order.show');
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::middleware('auth')->group(function () {
});

Auth::routes();
require __DIR__ . '/admin.php';

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
