<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.apartments');
    })->name('apartments');
    Route::get('/booking-requests', function () {
        return view('admin.apartments');
    })->name('bookingRequests');
    Route::get('/renters', function () {
        return view('admin.apartments');
    })->name('renters');
    Route::get('/rents', function () {
        return view('admin.apartments');
    })->name('rents');
    Route::get('/service-charges', function () {
        return view('admin.apartments');
    })->name('serviceCharges');
});
