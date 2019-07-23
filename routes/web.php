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

Route::get('/', 'PagesController@index'); //went to the PagesController and used the function called index

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

Route::resource('map', 'MapsController'); //routing for Map View (default & search)

Route::resource('directions', 'DirectionsController'); //routing for Directions View (accepting user input)

Route::resource('products', 'ProductsController'); // sub-access word, then the controller

Route::resource('purchases', 'PurchasesController'); //sub-access word then the controller

Route::resource('cart', 'CartsController'); //sub-access word then the controller

Route::resource('recommend', 'RecommendsController'); //sub-access word then the controller

Auth::routes(); //authentication

Route::get('/dashboard', 'DashboardController@index');

//admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
