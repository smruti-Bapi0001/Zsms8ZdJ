<?php

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

Route::get('/', 'ServiceRequestsController@index')->name('home');  
Route::get('/createServiceTicket', 'ServiceRequestsController@create')->name('createServiceTicket');  
Route::get('{serviceRequest}', 'ServiceRequestsController@editService')->name('edit');
Route::post('/storeServiceRequest', 'ServiceRequestsController@store');
Route::put('/editServiceRequest/{serviceRequest}', 'ServiceRequestsController@edit');
Route::get('/vehicle-models/{vehicleMake}', 'ServiceRequestsController@vehicleModel');
// Route::delete('{id}', 'ServiceRequestsController@delete');
Route::put('delete/{id}', 'ServiceRequestsController@delete');
