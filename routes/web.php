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
})->name('home');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('form-login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::group(['middleware' => 'is.admin'], function(){
        Route::get('/', 'DashboardController@index')->name('dashboard'); //DashBoard
        Route::resource('categories', 'CategoryController'); //Category
        Route::resource('products', 'ProductController'); //Product

        Route::get('products/{id}/size', 'ProductController@productSize')->name('product.size');
        Route::get('products/{id}/sizes/{sizeId}/edit', 'ProductController@productSizeEdit')->name('product.size.edit');
        Route::put('products/{id}/sizes/{sizeId}/edit', 'ProductController@productSizeStore')->name('product.size.store');

        Route::resource('orders', 'OrderController'); //Order
        Route::put('order-status/{id}/edit', 'OrderController@orderStatusEdit')->name('order.status.edit');
        Route::get('status-filter/', 'OrderController@orderStatusFilter')->name('order.status.filter');

        Route::resource('comments', 'CommentController'); //Comment
    });
});


Route::get('/home', 'HomeController@index')->name('home');
