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
Route::get('/{ScrollTo?}', 'HomeController@index')->name('home');

//TourController
Route::get('/tour-page/{id}','TourController@index');
Route::get('/create-tour-page/{id?}','TourController@create');
Route::post('/create-tour-page/{updateId?}','TourController@store')->name('tourStore');
Route::get('/remove-tour-page/{id}','TourController@remove');
Route::post('/book-tour','TourController@postBook');

//AdminController
Route::get('/adminadmin','AdminController@login');
Route::post('/adminadmin','AdminController@postLogin');
Route::get('/logout','AdminController@logout');


//CategoriesController
Route::get('create-category','CategoriesController@createCategory');
Route::post('create-category','CategoriesController@postCreateCategory');
Route::get('category/{id}','CategoriesController@category');
Route::get('edit-category/{id}','CategoriesController@editCategory');
Route::post('edit-category/{id}','CategoriesController@postEditCategory');
Route::get('remove-category/{id}','CategoriesController@remove');

