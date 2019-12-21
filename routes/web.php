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

Route::resource('/customer', 'CustomerController')->except([
    'create']);
Route::group(['prefix' => 'customer'], function()
{
   
	Route::get('/create','CustomerController@create')->name('customer.create');
    Route::post('/store','CustomerController@store')->name('customer.store');
    Route::delete('/{$id}','CustomerController@destroy')->name('customer.destroy');
    Route::get('/{$id}','CustomerController@show')->name('customer.show');
    Route::put('/{$id}','CustomerController@update')->name('customer.update');    
});

Route::resource('/purchase', 'PurchaseController')->except([
    'create', 'show']);
Route::group(['prefix' => 'purchase'], function()
{
    Route::get('/','PurchaseController@index')->name('purchase.index');
    Route::get('/create','PurchaseController@create')->name('purchase.create');
    Route::post('/store','PurchaseController@store')->name('purchase.store');
    Route::delete('/{$id}','PurchaseController@destroy')->name('purchase.destroy');
    Route::get('/{$id}/edit','PurchaseController@edit')->name('purchase.edit');
    Route::post('/getpro','PurchaseController@getproduct')->name('purchase.product');
    Route::Put('/{$id}','PurchaseController@update')->name('purchase.update');
    Route::get('/generatepdf','PurchaseController@generatepdf')->name('purchase.pdf');

});

Route::resource('/issuing', 'IssuingController')->except([
    'create', 'show']);
Route::group(['prefix' => 'issuing'], function()
{
    Route::get('/','IssuingController@index')->name('issuing.index');
    Route::get('/create','IssuingController@create')->name('issuing.create');
    Route::post('/store','IssuingController@store')->name('issuing.store');
    Route::delete('/{$id}','IssuingController@destroy')->name('issuing.destroy');
    Route::get('/{$id}/edit','IssuingController@edit')->name('issuing.edit');
    Route::post('/getpro','IssuingController@getproduct')->name('issuing.product');
    Route::post('/getnota','IssuingController@invoice')->name('issuing.invoice');
    Route::Put('/{$id}','IssuingController@update')->name('issuing.update');
    Route::post('/generatepdf','IssuingController@generatepdf')->name('issuing.pdf');

});

Route::resource('/invoice', 'InvoiceController')->except([
    'create', 'show']);
Route::group(['prefix' => 'invoice'], function()
{
    Route::get('/','InvoiceController@index')->name('invoice.index');
    Route::GET('/issuing','InvoiceController@issuing')->name('invoice.issuing');
    Route::get('/invis/{issuing_facture}','InvoiceController@invis')->name('invoice.invis');
    Route::get('/print_invis/{issuing_facture}','InvoiceController@print_invis')->name('invoice.print_invis');
    
    Route::get('/report_purchase','InvoiceController@report_purchase')->name('invoice.report_purchase');
    Route::GET('/purchase','InvoiceController@purchase')->name('invoice.purchase');
    Route::get('/inchase/{purchase_facture}','InvoiceController@inchase')->name('invoice.inchase');
    Route::get('/print_purchase/{purchase_facture}','InvoiceController@print_purchase')->name('invoice.print_purchase');

});
