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
Route::get('/market/sell/all/{id}', 'MarketController@sellAll');
Route::get('/market/buy/all/{id}', 'MarketController@buyMax');

Route::get('/storage', 'StorageController@displayStorages')->name('storage');
Route::get('/storage/storageUpgrade', 'StorageController@storageUpgrade');


//AJAX
Route::post('/ajax/storage/storageUpgrade', 'AjaxController@addStorageUpgrade')->name('ajaxStorageUpgrade');
