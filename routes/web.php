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

Route::group([ 'prefix' => 'news'], function(){
	Route::get('/', 'NewsController@index');
	Route::get('/{slug}', 'NewsController@single');
});

Route::group(['prefix' => 'account'], function () {
    Route::get('/', 'AccountController@index');

    Route::get('/login', 'AccountController@login');
    Route::post('/login', 'AccountController@email');

    Route::get('/auth', 'AccountController@auth');
    Route::post('/auth', 'AccountController@login_code');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

