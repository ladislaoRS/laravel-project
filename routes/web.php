<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::resource('flyers', 'FlyersController');

// Main Web Site Menu
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');

Route::get('{zip}/{street}', 'FlyersController@show');
Route::post('{zip}/{street}/photos', 'FlyersController@addPhoto');

