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
Route::get('/tourr','TourController@index');
Route::get('/tour/create','TourController@create');
Route::get('/myTourAdministrationNoteL8Zpx7','Admincontroller@');