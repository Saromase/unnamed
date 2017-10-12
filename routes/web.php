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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/market', 'MarketController@displayProducts')->name('market');
Route::get('/market/buy/{id}', 'MarketController@buyProduct');
Route::get('/market/sell/{id}', 'MarketController@sellProduct');

Route::get('/storage', 'StorageController@displayStorages')->name('storage');
