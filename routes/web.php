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
