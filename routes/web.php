<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminHotelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authentication
Auth::routes();

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profile
Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index')->name('profile.index');
    Route::get('/settings', 'edit')->name('profile.edit');
    Route::put('/settings', 'update')->name('profile.update');
});

// Admin
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index')->name('admin.index');
});

// Admin Hotels
Route::controller(AdminHotelController::class)->group(function () {
    Route::get('/admin/hotels', 'index')->name('admin.hotels.index');
    Route::get('/admin/hotels/create', 'create')->name('admin.hotels.create');
    Route::post('/admin/hotels', 'store')->name('admin.hotels.store');
    Route::get('/admin/hotels/{id}/edit', 'edit')->name('admin.hotels.edit');
    Route::put('/admin/hotels/{id}', 'update')->name('admin.hotels.update');
    Route::delete('/admin/hotels/{id}', 'destroy')->name('admin.hotels.destroy');
});

// Admin Rooms
Route::controller(RoomController::class)->group(function () {
    Route::get('/admin/rooms', 'index')->name('rooms.index');
    Route::get('/admin/rooms/create', 'create')->name('rooms.create');
    Route::post('/admin/rooms', 'store')->name('rooms.store');
    Route::get('/admin/rooms/{id}/edit', 'edit')->name('rooms.edit');
    Route::put('/admin/rooms/{id}', 'update')->name('rooms.update');
    Route::delete('/admin/rooms/{id}', 'destroy')->name('rooms.destroy');
});

// Admin Booking
Route::controller(AdminBookingController::class)->group(function () {
    Route::get('/admin/bookings', 'index')->name('admin.bookings.index');
    // Route::get('/admin/bookings/create', 'create')->name('admin.bookings.create');
    // Route::post('/admin/bookings', 'store')->name('admin.bookings.store');
    // Route::get('/admin/bookings/{id}', 'show')->name('admin.bookings.show');
    // Route::get('/admin/bookings/{id}/edit', 'edit')->name('admin.bookings.edit');
    // Route::put('/admin/bookings/{id}', 'update')->name('admin.bookings.update');
    Route::delete('/admin/bookings/{id}', 'destroy')->name('admin.bookings.destroy');
});

// Admin Users
Route::controller(UserController::class)->group(function () {
    Route::get('/admin/users', 'index')->name('users.index');
    Route::get('/admin/users/create', 'create')->name('users.create');
    Route::post('/admin/users', 'store')->name('users.store');
    Route::get('/admin/users/{id}/edit', 'edit')->name('users.edit');
    Route::put('/admin/users/{id}', 'update')->name('users.update');
    Route::delete('/admin/users/{id}', 'destroy')->name('users.destroy');
});

// Booking
Route::controller(BookingController::class)->group(function () {
    Route::get('/bookings', 'index')->name('bookings.index');
    Route::post('/bookings', 'store')->name('bookings.store')->middleware('auth');
});

// Hotels
Route::controller(HotelController::class)->group(function () {
    Route::get('/hotels', 'index')->name('hotels.index');
    Route::get('/hotels/{id}', 'show')->name('hotels.show');
});

Route::controller(SearchController::class)->group(function () {
    Route::post('/search/hotels', 'searchHotels')->name('search.hotels');
    Route::post('/search/rooms', 'searchRooms')->name('search.rooms');
});
