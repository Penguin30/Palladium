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

Route::group([ 'prefix' => 'tickets'], function(){
    Route::get('/{order_id}/{auth_code}', 'TicketsController@index');
    Route::post('return', 'TicketsController@return');
});

Route::group([ 'prefix' => 'order'], function(){
    Route::get('/{order_id}/{auth_code}', 'TicketsController@order_pay');
    Route::post('/pay/{order_id}', 'TicketsController@sale_order');
});

Route::group([ 'prefix' => 'showtime'], function(){
    Route::get('/{showtime_id}', 'ShowTimesController@index');
    Route::post('/order/{showtime_id}', 'ShowTimesController@order');
    Route::get('/order/{showtime_id}', function ($showtime_id) {
        return redirect('/showtime/'.$showtime_id);
    });
    Route::post('/pay/{showtime_id}', 'ShowTimesController@pay');
    Route::get('/pay/{showtime_id}', function ($showtime_id) {
        return redirect('/showtime/'.$showtime_id);
    });
});

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

    Route::post('/card/register', 'AccountController@register_card');
    Route::post('/card/delete', 'AccountController@delete_card');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

