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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function(){
    Route::resource('user','UserController');
    Route::get('user/{id}/destroy',[
      'uses' => 'UserController@destroy',
      'as' => 'admin.user.destroy'
    ]);
    });

    Route::group(['prefix' => 'admin'], function(){
      Route::resource('reserva','ReservaController');
      Route::get('reserva/{id}/crear',[
        'uses' => 'ReservaController@create',
        'as' => 'admin.reserva.crear'
      ]);
      Route::get('reserva/{id}/destroy',[
        'uses' => 'ReservaController@destroy',
        'as' => 'admin.reserva.destroy'
      ]);
      });
Route::get('/home', 'HomeController@index')->name('home');
