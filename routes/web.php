<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'authController@index');
Route::get('/login', 'authController@index');

Route::post('/', [
    'uses' => 'authController@adminauth'
  ]);

Route::post('/login', [
    'uses' => 'authController@adminauth'
  ]);

Route::get('/logout', 'authController@logout');

Route::get('/addguard', 'userAuthController@create');

Route::post('/addguard', [
    'uses' => 'userAuthController@add'
  ]);

Route::resource('frames','adminFrameController');

Route::resource('faces','adminFaceController');
