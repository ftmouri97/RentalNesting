<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\FrontController;

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

/**
 *  Frontend routes
 */

Route::get('/','FrontController@index')->name('home');
Route::get('apartment-details/{id}','FrontController@aparmentDetail')->name('aparmentDetail');
Route::post('zone-searching','FrontController@zoneSearching')->name('zoneSearching');
Route::post('apartment-searching','FrontController@apartmentSearching')->name('apartmentSearching');

Route::view('/registration','registration')->name('registration');
Route::view('/login','login');

Route::namespace('Auth')->group(function () {
  Route::post('/register','AuthController@process_register')->name('reg_process');
  Route::post('/login','AuthController@process_login')->name('login');
  Route::get('/logout','AuthController@logout')->name('logout');
});

/**
 *  Owner routes
 */
Route::group(['prefix' => 'owner','middleware' => 'owner'], function()
{
    Route::view('/','owner.dashboard')->name('owner-dashboard');
    Route::view('apartments','owner.apartments')->name('apartments');
    Route::view('/booking-requests','owner.booking-requests')->name('bookingRequests');
    Route::view('/renters','owner.renters')->name('renters');
    Route::view('/rents','owner.rents')->name('rents');
    Route::view('/service-charges','owner.service-charges')->name('serviceCharges');
    Route::view('/gas-bill','owner.gas-bill')->name('gasBill');
    Route::view('/complains', 'owner.complain')->name('complains');;

    /*
    *  apartment-details operations
    */
    Route::get('/read-apartment-details','OwnerController@readApartmentDetails')->name('readApartmentDetails');
    Route::post('/create-apartment-details','OwnerController@createApartmentDetails')->name('createApartmentDetails');
    Route::get('/edit-apartment-details/{id}','OwnerController@editApartmentDetails')->name('editApartmentDetails');
    Route::post('/update-apartment-details','OwnerController@updateApartmentDetails')->name('updateApartmentDetails');
    Route::get('/manage-apartment-details-images/{id}','OwnerController@manageApartmentDetailsImages')->name('manageApartmentDetailsImages');
    Route::post('/create-apartment-details-images','OwnerController@createApartmentDetailsImages')->name('createApartmentDetailsImages');
    Route::get('/delete-apartment-details-single-image/{id}/{image}','OwnerController@deleteApartmentDetailsSingleImage')->name('deleteApartmentDetailsSingleImage');
    Route::get('/delete-apartment-details/{id}','OwnerController@deleteApartmentDetails')->name('deleteApartmentDetails');

    /***
     *  Booking request routes
     */
    Route::get('read-bookings-requests','OwnerController@readBookingsRequests')->name('readBookingsRequests');
    Route::post('accept-booking-request/','OwnerController@acceptBookingRequest')->name('acceptBookingsRequests');
    Route::get('delete-booking-request/{id}','OwnerController@deleteBookingRequest')->name('deleteBookingsRequests');


    /**
     *  Renter detail routes
     * */
    Route::get('read-renter-details','OwnerController@readRenterDetails')->name('readRenterDetails');
    Route::get('rent-accepting/{id}','OwnerController@rentAccepting')->name('rentAccepting');
    Route::get('service-charge-accepting/{id}','OwnerController@serviceChargeAccepting')->name('serviceChargeAccepting');
    Route::get('gas-bill-accepting/{id}','OwnerController@gasBillAccepting')->name('gasBillAccepting');
    /**
     * Showing rents and services and complain
     */
    Route::get('rent-showing','OwnerController@rentShowing')->name('rentShowing');
    Route::get('service-charge-showing','OwnerController@serviceChargeShowing')->name('serviceChargeShowing');
    Route::get('gas-bill-showing','OwnerController@gasBillShowing')->name('gasBillShowing');
    Route::get('complain-showing','OwnerController@complainShowing')->name('complainShowing');
});


/**
 *
 *    Admin panel routes here
 *
 *
 **/
Route::group(['prefix' => 'admin',  'middleware' => 'admin'],function(){
  Route::view('/','admin.dashboard')->name('admin-dashboard');
  Route::view('/owner-posts','admin.ownerPosts')->name('ownerPosts');
  Route::view('/owner-login','admin.ownerLogin')->name('ownerLogin');
  Route::view('/commission','admin.commission')->name('commission');


  /**
   * Owner Registration Page
   */
  Route::get('owner-login-requests','AdminController@ownerRegistrationRequests');
  Route::get('owner-approval/{id}','AdminController@ownerApproval');
  Route::get('owner-panding-posts','AdminController@ownerPandingPosts');
  Route::get('accept-owner-panding-posts/{id}','AdminController@acceptOwnerPandingPosts');
  Route::get('delete-owner-panding-posts/{id}','AdminController@deleteOwnerPandingPosts');
});




Route::group(['prefix' => 'renter',  'middleware' => 'renter'], function()
{
    Route::view('/','renter.dashboard')->name('renter-dashboard');
    Route::view('notification','renter.notification')->name('notification');
    Route::view('booking-list','renter.booking-list')->name('booking-list');
    Route::view('rent-details','renter.rent-details')->name('rent-details');
    Route::view('service-charge-details','renter.service-charge-details')->name('service-charge-details');
    Route::view('gas-bill-details','renter.gas-bill-details')->name('gas-bill-details');
    Route::view('complain','renter.complain')->name('complain');
    Route::get('get_all_booking','RenterController@get_all_booking');
    Route::get('get_notification','RenterController@get_notification');
    Route::get('get_rent_details','RenterController@get_rent_details');
    Route::get('get_service_charge_details','RenterController@get_service_charge_details');
    Route::get('get_gas_bill_details','RenterController@get_gas_bill_details');
    Route::get('rent_details_insertion','RenterController@rent_details_insertion');
    Route::get('check_notification','RenterController@check_notification')->name('check_notification');
    Route::post('show_apartment_details','RenterController@show_apartment_details');
    Route::post('cancel_booking','RenterController@cancel_booking');
    Route::post('submit_complain','RenterController@submit_complain');

    Route::get('rent-apartment/{id}','RenterController@rentApartment')->name('rent-apartment');
});


