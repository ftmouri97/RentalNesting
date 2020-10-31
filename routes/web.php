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
    *  apartment-details operations
    */
    Route::get('/read-apartment-details','OwnerController@readApartmentDetails')->name('readApartmentDetails');
    Route::post('/create-apartment-details','OwnerController@createApartmentDetails')->name('createApartmentDetails');
    Route::get('/delete-apartment-details/{id}','OwnerController@deleteApartmentDetails')->name('deleteApartmentDetails');

});

Route::prefix('renter')->group(function () {
    Route::view('/','renter.dashboard')->name('dashboard');
    Route::view('notification','renter.notification')->name('notification');
    Route::view('booking-list','renter.booking-list')->name('booking-list');
    Route::view('rent-details','renter.rent-details')->name('rent-details');
    Route::view('service-charge-details','admin.rents');
    Route::view('gas-bill-details','admin.service-charges');
    Route::view('complain','admin.service-charges');
    Route::get('get_all_booking','RenterController@get_all_booking');
    Route::get('get_notification','RenterController@get_notification');
    Route::get('get_rent_details','RenterController@get_rent_details');
    Route::get('rent_details_insertion','RenterController@rent_details_insertion');
    Route::get('check_notification','RenterController@check_notification');
    Route::post('show_apartment_details','RenterController@show_apartment_details');
    Route::post('cancel_booking','RenterController@cancel_booking');
    
  
});


