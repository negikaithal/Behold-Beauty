<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| beholdBeauty Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/makeup-artist', [HomeController::class, 'artist'])->name('artist');
Route::get('/bridal-makeup', [HomeController::class, 'bridalMakeup'])->name('bridal-makeup');
Route::get('/bridal-packages', [HomeController::class, 'bridalPackages'])->name('bridal-packages');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');

// Services Routes
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Appointment Booking Routes
Route::get('/book-appointment', [BookingController::class, 'create'])->name('booking.create');
Route::post('/book-appointment', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking-confirmation/{booking_number}', [BookingController::class, 'confirmation'])->name('booking.confirmation');
