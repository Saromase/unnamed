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

// Market
Route::get('/market', function() {
    return redirect('/market/home');
});

// Market display
Route::get('/market/home', 'MarketController@displayMarketHome')->name('market');

Route::get('/market/tier/one', 'MarketController@displayProductsTierOne')->name('marketTierOne');
Route::get('/market/tier/two', 'MarketController@displayProductsTierTwo')->name('marketTierTwo');
Route::get('/market/factory', 'MarketController@displayFactory')->name('marketFactory');

// Market Achat-Vente
Route::get('/market/buy/{id}', 'MarketController@buyProduct');
Route::get('/market/sell/{id}', 'MarketController@sellProduct');
Route::get('/market/sell/all/{id}', 'MarketController@sellAll');
Route::get('/market/buy/all/{id}', 'MarketController@buyMax');

// Storage
Route::get('/storage', 'StorageController@displayStorages')->name('storage');

// Skills
Route::get('/skills', 'SkillsController@displaySkills')->name('skills');

// Admin Panel
Route::get('/adminPanel', function() {
    return redirect('/adminPanel/home');
});
Route::get('/adminPanel/home', 'AdminController@displayHomeAdminPanel')->name('adminPanel');
Route::get('/adminPanel/products', 'AdminController@displayProductsAdminPanel')->name('adminPanelProducts');
Route::get('/adminPanel/users', 'AdminController@displayUsersAdminPanel')->name('adminPanelUsers');


// AJAX
Route::post('/ajax/home/chartUpdate', 'AjaxController@refreshChartDonut')->name('refreshChartDonut');
Route::post('/ajax/storage/storageUpgrade', 'AjaxController@addStorageUpgrade')->name('ajaxStorageUpgrade');
Route::post('/ajax/products/productsUpdate', 'AjaxController@refreshProductsPrice')->name('refreshProductsPrice');
