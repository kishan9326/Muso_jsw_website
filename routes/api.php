<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\VisitBookingController;
use App\Http\Controllers\WhatsonBookingController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\DoodleUserDetailsController;
use App\Http\Controllers\EventOrganiserController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\MusoMembershipController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\DoodlePromptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ZohoController as ApiZohoController;
use Illuminate\Support\Facades\CSRFToken; // KS CHANGES

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AboutController::class)->group(function () {
    Route::get('/getAboutContent', 'getAboutContent')->name('getAboutContent')->middleware('ensureToken');   //homepage
  });

Route::controller(HomepageController::class)->group(function () {
    Route::get('/getVideo', 'getVideo')->name('getVideo')->middleware('ensureToken');
    Route::post('/homepage_video', 'homepage_video')->name('homepage_video')->middleware('ensureToken');
    Route::post('/email_newsletter', 'email_newsletter')->name('email_newsletter')->middleware('ensureToken');
});



Route::controller(ContactController::class)->group(function () {
    Route::get('/get_contact_data', 'getContactData')->name('get_contact_data')->middleware('ensureToken');
    Route::post('/booking_submit', 'bookingRequest')->name('booking_submit'); //this api is not in use
});

Route::controller(TeamsController::class)->group(function () {
    Route::get('/get_teams_data', 'get_teams_data')->name('get_teams_data')->middleware('ensureToken');
});

Route::controller(EventOrganiserController::class)->group(function () {
    Route::post('/get_event_orgniser', 'get_event_orgniser')->name('get_event_orgniser')->middleware('ensureToken'); //this api is not in use
});

Route::controller(MusoMembershipController::class)->group(function () {
    Route::get('/get_musoMembership_data', 'get_musoMembership_data')->name('get_musoMembership_data')->middleware('ensureToken');
});

Route::controller(DoodleUserDetailsController::class)->group(function () {
    Route::post('/store_doodle', 'store_doodle_details')->name('store_doodle')->middleware('ensureToken'); //-=============
    Route::post('/store_user', 'store')->name('store_user')->middleware('ensureToken');
    Route::get('/getuser', 'getAllUserDetails')->name('getuser')->middleware('ensureToken');
    Route::get('/latest_doodles', 'getLatestRecords')->name('latest_doodles')->middleware('ensureToken');
});

Route::controller(DoodlePromptController::class)->group(function () {
    Route::get('/getPromptDataApi', 'getPromptDataApi')->name('getPromptDataApi')->middleware('ensureToken');
});


Route::controller(ExploreController::class)->group(function () {
    Route::get('/get_explore_details', 'get_explore_api')->name('get_explore_details')->middleware('ensureToken');
    Route::get('/get_explore_tab_details', 'get_explore_tab_api')->name('get_explore_tab_details')->middleware('ensureToken');
});


Route::post('/visit-bookings', [VisitBookingController::class, 'store'])->name('visit-bookings')->middleware('ensureToken');
Route::get('/visit-bookings-records', [VisitBookingController::class, 'index'])->name('visit-bookings-records')->middleware('ensureToken');


//WHATS ON STORE DATA AFTER FORM SUBMIT
Route::post('/whatson-bookings', [WhatsonBookingController::class, 'whatson_store'])->name('whatson-bookings')->middleware('ensureToken');
//

Route::get('zoho/access_token', [ApiZohoController::class, 'access_token'])->name('zoho.access_token')->middleware('ensureToken');
Route::get('zoho/event_types', [ApiZohoController::class, 'event_types'])->name('zoho.event_types')->middleware('ensureToken');
Route::get('zoho/events', [ApiZohoController::class, 'events'])->name('zoho.events')->middleware('ensureToken');
Route::get('zoho/booking', [ApiZohoController::class, 'slots'])->name('zoho.slots')->middleware('ensureToken');
// 
Route::post('/webhook', [CallbackController::class, 'webhook'])->name('webhook');
//
Route::post('/whatson_webhook', [CallbackController::class, 'whatson_webhook'])->name('whatson_webhook');
//

Route::post('/visit_member_form', [VisitController::class, 'store'])->name('visit_member_form')->middleware('ensureToken');

Route::post('/visit_school_form', [VisitController::class, 'store_visit_school'])->name('visit_school_form')->middleware('ensureToken');

// 
Route::get('/thank_you/', [VisitBookingController::class, 'fetchRecords'])->name('thank_you')->middleware('ensureToken');

// whatson thank-you
Route::get('/whatson_thank_you/', [WhatsonBookingController::class, 'fetchRecords_whatson_page'])->name('whatson_thank_you')->middleware('ensureToken');



// CSRF
Route::get('token', function (Request $request) {
    $token = csrf_token();
    return array('header' => array('code' => 200, 'status' => 'success'), 'body' => array('result' => $token));
});
Route::get('token_verify', function (Request $request) {})->middleware('ensureToken');

