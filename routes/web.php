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

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
    Route::group(['middleware' => 'is.admin'], function(){
        Route::get('/', 'Admin\DashboardController@index')->name('dashboard'); //DashBoard
        Route::resource('categories', 'Admin\CategoryController'); //Category
        Route::resource('products', 'Admin\ProductController'); //Product
    });
});


Route::get('/home', 'HomeController@index')->name('home');
