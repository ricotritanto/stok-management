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

// Route::resource('/product', 'ProductController')->except([
//     'create', 'show']);
Route::group(['prefix' => 'product'], function()
{
	Route::get('/','ProductController@index')->name('product.index');
	Route::get('/create','ProductController@create')->name('product.create');
    Route::post('/store','ProductController@store')->name('product.store');
    Route::get('/destroy/{$id}','ProductController@destroy')->name('product.destroy');
    Route::get('/edit/{$id}','ProductController@edit')->name('product.edit');
});