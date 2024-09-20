<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
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
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('profile/update-profile-image', [ProfileController::class, 'updateProfileImage'])->name('profile.updateImage');
Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('book/schedule', [BookingController::class, 'schedulePage'])->middleware('auth')->name('book.schedule.index');
Route::get('order', [BookingController::class, 'orderIndex'])->name('order.index');
Route::post('order', [OrderController::class, 'store'])->name('order.store');
Route::post('order/{order:order_code}/payment-receipt', [BookingController::class, 'uploadPaymentReceipt'])->name('order.paymentReceipt');
Route::post('order/check-schedule/field/{field:slug}', [BookingController::class, 'checkSchedule'])->name('order.checkSchedule');
Route::get('order/{order:order_code}', [BookingController::class, 'orderDetail'])->name('order.show');
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');


/**
 * socialite auth
 */
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider'])->name('socialite');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

Auth::routes();
Auth::routes(['verify' => true]);
require __DIR__ . '/admin.php';

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
