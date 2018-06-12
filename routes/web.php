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

//HomeController
Route::get('/', 'HomeController@index')->name('home');

//TourController
Route::get('/tour-page/{id}','TourController@index');
Route::get('/create-tour-page/','TourController@create');
Route::post('/create-tour-page/','TourController@store')->name('tourStore');

//AdminController
Route::get('/adminadmin','AdminController@login');
Route::post('/adminadmin','AdminController@postLogin');
