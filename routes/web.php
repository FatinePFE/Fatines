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

Route::group(
[
    'prefix' => 'categories',
], function () {

    Route::get('/', 'CategoriesController@index')
         ->name('categories.category.index');

    Route::get('/create','CategoriesController@create')
         ->name('categories.category.create');

    Route::get('/show/{category}','CategoriesController@show')
         ->name('categories.category.show')
         ->where('id', '[0-9]+');

    Route::get('/{category}/edit','CategoriesController@edit')
         ->name('categories.category.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CategoriesController@store')
         ->name('categories.category.store');

    Route::put('category/{category}', 'CategoriesController@update')
         ->name('categories.category.update')
         ->where('id', '[0-9]+');

    Route::delete('/category/{category}','CategoriesController@destroy')
         ->name('categories.category.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'shops',
], function () {

    Route::get('/', 'ShopsController@index')
         ->name('shops.shop.index');

    Route::get('/create','ShopsController@create')
         ->name('shops.shop.create');

    Route::get('/show/{shop}','ShopsController@show')
         ->name('shops.shop.show')
         ->where('id', '[0-9]+');

    Route::get('/{shop}/edit','ShopsController@edit')
         ->name('shops.shop.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'ShopsController@store')
         ->name('shops.shop.store');

    Route::put('shop/{shop}', 'ShopsController@update')
         ->name('shops.shop.update')
         ->where('id', '[0-9]+');

    Route::delete('/shop/{shop}','ShopsController@destroy')
         ->name('shops.shop.destroy')
         ->where('id', '[0-9]+');

});


Route::group(
[
    'prefix' => 'cities',
], function () {

    Route::get('/', 'CitiesController@index')
         ->name('cities.city.index');

    Route::get('/create','CitiesController@create')
         ->name('cities.city.create');

    Route::get('/show/{city}','CitiesController@show')
         ->name('cities.city.show')
         ->where('id', '[0-9]+');

    Route::get('/{city}/edit','CitiesController@edit')
         ->name('cities.city.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CitiesController@store')
         ->name('cities.city.store');
               
    Route::put('city/{city}', 'CitiesController@update')
         ->name('cities.city.update')
         ->where('id', '[0-9]+');

    Route::delete('/city/{city}','CitiesController@destroy')
         ->name('cities.city.destroy')
         ->where('id', '[0-9]+');

});
