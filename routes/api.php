<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// List frames
Route::get('frames', 'frameController@index');

// List Single frame
Route::get('frame/{id}', 'frameController@show');

// Add new frame (run in flask by model)
Route::post('create_frame', 'frameController@store');

// Update frame (useless)
Route::put('update_frame/{id}', 'frameController@update');

// Delete frame
Route::delete('delete_frame/{id}', 'frameController@destroy');



// List faces
Route::get('faces', 'faceController@index');

// List Single face
Route::get('face/{id}', 'faceController@show');


// Add new face (run in flask by model)
Route::post('create_face/{id}', 'faceController@store');


// Delete face
Route::delete('delete_face/{id}', 'faceController@destroy');


// guard auth
Route::post('/auth', 'userAuthController@userauth' );





// Route::get('/noti', function () {

//     $SERVER_API_KEY = 'AAAAcZCvbcM:APA91bGGjFe8CciksPPzaPMwRS_7RVhrK9UEVrypdZVZjb0QKu6q8STO6qdonE-W9ibxKlXCIs0UBw7OkI9FvTXrtgYwv4IhmGpJtZzyIrECf8XLs_ERgwLVb90YNxg1DIzd7R--Jz1x';

//     $token_1 = 'cy57mMRiRLmIXeQLVuuJKy:APA91bFpZEOX5m_76ZzE2IYjcrxtomfxC7pkZ2bmZIw8FAn1tchwaOL3GJlcBVg5wM3X7h4Ns9vtcZ8_0Gj_J9z-Qbfvda7COxyhNiCqHe5QEJtd6LS5VCk8omn3nJu9sjFAMjVyOE';

//     $data = [

//         "registration_ids" => [
//             $token_1
//         ],

//         "notification" => [

//             "title" => 'Hello from back-end',

//             "body" => 'this is tested notification, Yasmine Arafa',

//             "sound"=> "default" // required for sound on ios

//         ],

//     ];

//     $dataString = json_encode($data);

//     $headers = [

//         'Authorization: key=' . $SERVER_API_KEY,

//         'Content-Type: application/json',

//     ];

//     $ch = curl_init();

//     curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

//     curl_setopt($ch, CURLOPT_POST, true);

//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//     curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

//     $response = curl_exec($ch);

//     dd($response);

// });
