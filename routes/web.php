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

Route::resource('products', 'ProductsController'); // sub-access word, then the controller


Auth::routes(); //authentication

Route::get('/dashboard', 'DashboardController@index');

//admin
// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });

Route::group(['middleware'=>['auth','admin']],function(){

        Route::get('/admin/dashboard',function(){
                return view('admin.dashboard');
        });

        Route::get('admin/role-register','Admin\DashboardController@register');

        Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
        
        Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');

        Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

        Route::get('/abouts','Admin\AboutusController@index');

        Route::post('/save-aboutus','Admin\AboutusController@store');
        Route::get('/about-us/{id}','Admin\AboutusController@edit');
        Route::put('/aboutus-update/{id}','Admin\AboutusController@update');
        Route::delete('about-us-delete/{id}','Admin\AboutusController@delete');

        Route::get('/service-category','Admin\ServiceController@index');
        Route::get('/service-create','Admin\ServiceController@create');
        Route::post('/category-store','Admin\ServiceController@store');
        Route::get('/service-cate-edit/{id}','Admin\ServiceController@edit');
        Route::put('/category-update/{id}','Admin\ServiceController@update');
        Route::delete('/service-category-delete/{id}','Admin\ServiceController@delete');
        Route::get('/service-list','Admin\ServicelistController@index');
});


