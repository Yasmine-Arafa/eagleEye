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


//Route::resource('events', 'eventController');

// //list events
// Route::get('events','eventController@index');

// //list single event
// Route::get('event/{id}','eventController@show');

// //store new event
// Route::post('add','eventController@store');

// //update event
// Route::put('update/{id}','eventController@update');

// //delete event
// Route::delete('delete/{id}','eventController@destroy');


