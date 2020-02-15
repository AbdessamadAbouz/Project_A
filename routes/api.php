<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Update new City to the database
Route::post("cities","citiesController@store");

//Update new Delivery Time
Route::post("delivery_time","Delivery_TimeController@store");

// Attache cities to delivery times
Route::post("cities/{city_id}/delivery_times","DeliveryCityController@store");

// Exclude a date from the delivery days
Route::post('exclude/{city_id}','excludeController@store');

//
Route::get('cities/{city_id}/delivery_dates_times/{number_of_days}','UserController@showdates');