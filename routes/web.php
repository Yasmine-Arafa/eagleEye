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

//Route::get('data','frameController@index');


//Route::get('face/{id}', 'faceController@show');


//Route::resource('events', 'frameController');

// //list events
// Route::get('events','frameController@index');

// //list single event
// Route::get('event/{id}','frameController@show');

// //store new event
// Route::post('add','frameController@store');

// //update event
// Route::put('update/{id}','frameController@update');

// //delete event
// Route::delete('delete/{id}','frameController@destroy');


