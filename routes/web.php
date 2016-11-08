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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', 'UsersController@profile');
Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'admin', 'middleware' => 'role:administrator'], function() {
    Route::get('/', 'Admin\HomeController@index');

    Route::get('users', 'Admin\UsersController@overview');
    Route::get('user/edit/{user}', 'Admin\UsersController@edit');
    Route::post('user/update', 'Admin\UsersController@edit');

    Route::get('locations', 'Admin\LocationsController@overview');
    Route::get('location/edit/{location}', 'Admin\LocationsController@edit');
    Route::post('location/update', 'Admin\LocationsController@update');
    Route::get('location/create', 'Admin\LocationsController@create');
    Route::get('location/store', 'Admin\LocationsController@store');

    Route::get('templates', 'Admin\TemplatesController@overview');
    Route::get('template/create', 'Admin\TemplatesController@create');
    Route::post('template/create', 'Admin\TemplateController@store');
    Route::get('template/edit/{id}', 'Admin\TemplatesController@edit');
    Route::post('template/update', 'Admin\TemplateController@update');
});


Route::get('/mobile', function () {
    return view('mobile.index');
});
Route::get('/mobile/details', function () {
    return view('mobile.details');
});
