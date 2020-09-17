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
    return redirect()->route('login');
});

Auth::routes();



Route::group(['middleware' => 'auth'], function (){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('ad-status', 'AdStatusController');
    Route::get('on-status/{id}', 'AdStatusController@onAdStatus')->name('on-status');
    Route::get('off-status/{id}', 'AdStatusController@offAdStatus')->name('off-status');

});
