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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', 'HomeController@index')->name('home');

Route::get('/tour-page','TourController@index');
Route::get('/tour-page/create','TourController@create');
Route::post('/tour-page/store','TourController@store')->name('tourStore');
