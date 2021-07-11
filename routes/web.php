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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/submit_add_details','FormController@addDetails')->name('user_add_details');

Route::get('/get_available_slots', 'CalendarController@getAvailableSlots');

Route::get('/insert', 'CalendarController@insertNew');

Route::get('/clear_all', 'CalendarController@clearAll');

Route::post('/image_upload', 'FormController@imageUploadPost');


Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Admins'], function () {
    Route::get('/', 'AdminController@index');

    Route::get('/users', 'AdminController@userList');
    Route::get('/bookings/{id?}', 'AdminController@bookingsList');
    Route::get('/edituser/{id}', 'AdminController@userEdit');

    Route::get('/instructor/{id?}', 'AdminController@instructorList');
    Route::get('/suburb/{postid?}', 'AdminController@suburbList');
    Route::get('/accounts/{id?}', 'AdminController@accountList');

});