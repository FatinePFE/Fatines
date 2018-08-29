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

/*
Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/', 'OffresController@index2')->name('welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('queries', 'QueryController');

#Route::get('/profile', 'UserController@edit')->name('users.user.edit');
#Route::patch('/users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);


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

        Route::group(
        [
            'prefix' => 'deltypes',
        ], function () {

            Route::get('/', 'DeltypesController@index')
                 ->name('deltypes.deltype.index');

            Route::get('/create','DeltypesController@create')
                 ->name('deltypes.deltype.create');

            Route::get('/show/{deltype}','DeltypesController@show')
                 ->name('deltypes.deltype.show')
                 ->where('id', '[0-9]+');

            Route::get('/{deltype}/edit','DeltypesController@edit')
                 ->name('deltypes.deltype.edit')
                 ->where('id', '[0-9]+');

            Route::post('/', 'DeltypesController@store')
                 ->name('deltypes.deltype.store');

            Route::put('deltype/{deltype}', 'DeltypesController@update')
                 ->name('deltypes.deltype.update')
                 ->where('id', '[0-9]+');

            Route::delete('/deltype/{deltype}','DeltypesController@destroy')
                 ->name('deltypes.deltype.destroy')
                 ->where('id', '[0-9]+');

        });

        Route::group(
        [
            'prefix' => 'offres',
        ], function () {

            Route::get('/', 'OffresController@index')
                 ->name('offres.offre.index')
                 ->middleware('auth');

            Route::get('/create','OffresController@create')
                 ->name('offres.offre.create')
                 ->middleware('auth');

            Route::get('/show/{offre}','OffresController@show')
                 ->name('offres.offre.show')
                 ->where('id', '[0-9]+')
                 ->middleware('auth');

            Route::get('/{offre}/edit','OffresController@edit')
                 ->name('offres.offre.edit')
                 ->where('id', '[0-9]+')
                 ->middleware('auth');

            Route::post('/', 'OffresController@store')
                 ->name('offres.offre.store');

            Route::put('offre/{offre}', 'OffresController@update')
                 ->name('offres.offre.update')
                 ->where('id', '[0-9]+')
                 ->middleware('auth');

            Route::delete('/offre/{offre}','OffresController@destroy')
                 ->name('offres.offre.destroy')
                 ->where('id', '[0-9]+')
                 ->middleware('auth');

        });


Route::group(
[
    'prefix' => 'users',
], function () {

    Route::get('/', 'UsersController@index')
         ->name('users.user.index')
         ->middleware('auth');

    Route::get('/create','UsersController@create')
         ->name('users.user.create')
         ->middleware('auth');

    Route::get('/show/{user}','UsersController@show')
         ->name('users.user.show')
         ->where('id', '[0-9]+')
         ->middleware('auth');

    Route::get('/{user}/edit','UsersController@edit')
         ->name('users.user.edit')
         ->where('id', '[0-9]+')
         ->middleware('auth');

    Route::post('/', 'UsersController@store')
         ->name('users.user.store')
         ->middleware('auth');

    Route::put('user/{user}', 'UsersController@update')
         ->name('users.user.update')
         ->where('id', '[0-9]+')
         ->middleware('auth');

    Route::delete('/user/{user}','UsersController@destroy')
         ->name('users.user.destroy')
         ->where('id', '[0-9]+');

});
