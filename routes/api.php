<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




// List events
Route::get('events', 'eventController@index');

// List Single event
Route::get('event/{id}', 'eventController@show');

// Add new event
Route::post('create', 'eventController@store');

// Update event
Route::put('update/{id}', 'eventController@update');

// Delete event
Route::delete('delete/{id}', 'eventController@destroy');




Route::get('/noti', function () {

    $SERVER_API_KEY = 'AAAAcZCvbcM:APA91bGGjFe8CciksPPzaPMwRS_7RVhrK9UEVrypdZVZjb0QKu6q8STO6qdonE-W9ibxKlXCIs0UBw7OkI9FvTXrtgYwv4IhmGpJtZzyIrECf8XLs_ERgwLVb90YNxg1DIzd7R--Jz1x';

    $token_1 = 'cy57mMRiRLmIXeQLVuuJKy:APA91bFpZEOX5m_76ZzE2IYjcrxtomfxC7pkZ2bmZIw8FAn1tchwaOL3GJlcBVg5wM3X7h4Ns9vtcZ8_0Gj_J9z-Qbfvda7COxyhNiCqHe5QEJtd6LS5VCk8omn3nJu9sjFAMjVyOE';

    $data = [

        "registration_ids" => [
            $token_1
        ],

        "notification" => [

            "title" => 'Hello from back-end',

            "body" => 'this is tested notification, Yasmine Arafa',

            "sound"=> "default" // required for sound on ios

        ],

    ];

    $dataString = json_encode($data);

    $headers = [

        'Authorization: key=' . $SERVER_API_KEY,

        'Content-Type: application/json',

    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);

    dd($response);

});
