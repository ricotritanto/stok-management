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
Route::resource('/category', 'CategoryController')->except([
    'create', 'show'
]);
Route::resource('/brand', 'BrandController')->except([
    'create', 'show'
]);

Route::resource('/product', 'ProductController')->except([
    'create', 'show']);
Route::group(['prefix' => 'product'], function()
{
	Route::get('/','ProductController@index')->name('product.index');
	Route::get('/create','ProductController@create')->name('product.create');
    Route::post('/store','ProductController@store')->name('product.store');
    Route::delete('/{$id}','ProductController@destroy')->name('product.destroy');
    Route::get('/{$id}/edit','ProductController@edit')->name('product.edit');
    Route::Put('/{$id}','ProductController@update')->name('product.update');
});

Route::resource('/suplier', 'SuplierController')->except([
    'create', 'show']);
Route::group(['prefix' => 'suplier'], function()
{
	Route::get('/','SuplierController@index')->name('suplier.index');
	Route::get('/create','SuplierController@create')->name('suplier.create');
    Route::post('/store','SuplierController@store')->name('suplier.store');
    Route::delete('/{$id}','SuplierController@destroy')->name('suplier.destroy');
    Route::get('/{$id}/edit','SuplierController@edit')->name('suplier.edit');
    Route::Put('/{$id}','SuplierController@update')->name('suplier.update');
});
