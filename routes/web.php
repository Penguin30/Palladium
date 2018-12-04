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

Route::get('/', 'HomeController@index');
Route::get('/films/{alias}','FilmsController@film');
Route::get('/shedule', 'SheduleController@index');
Route::get('/contacts', 'ContactsController@index');
Route::post('/form-feedback', 'FormController@index');
Route::get('/price', 'HallController@price');

Route::get('/vip-hall', 'HallController@vip');
Route::get('/vip-film/{slug}', 'HallController@film');
Route::post('/vip-film/search', 'HallController@search');

Route::get('/showtime/{showtime_id}', 'ShowTimesController@index');

Route::group([ 'prefix' => 'news'], function(){
	Route::get('/', 'NewsController@index');
	Route::get('/{slug}', 'NewsController@single');
});

Route::group(['prefix' => 'account'], function () {
    Route::get('/', 'AccountController@index');

    Route::get('/login', 'AccountController@login');
    Route::post('/login', 'AccountController@email');

    Route::get('/login/google', 'AccountController@google_redirect');
    Route::get('/login/google_callback', 'AccountController@google_callback');

    Route::get('/login/facebook', 'AccountController@facebook_redirect');
    Route::get('/login/facebook_callback', 'AccountController@facebook_callback');

    Route::get('/auth', 'AccountController@auth');
    Route::post('/auth', 'AccountController@login_code');

    Route::get('/logout', 'AccountController@logout');

    Route::post('/create_profile', 'AccountController@create_profile');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

