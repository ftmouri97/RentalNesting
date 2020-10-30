<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;

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

Route::prefix('owner')->group(function () {
    Route::view('','admin.dashboard')->name('dashboard');
    Route::view('apartments','admin.apartments')->name('apartments');
    Route::view('/booking-requests','admin.booking-requests')->name('bookingRequests');
    Route::view('/renters','admin.renters')->name('renters');
    Route::view('/rents','admin.rents')->name('rents');
    Route::view('/service-charges','admin.service-charges')->name('serviceCharges');

    /*
    *  apartment-details
    */
    // Route::view('/service-charges','admin.service-charges')->name('serviceCharges');
});
