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

Route::get('/', 'HomeController@index')->name('trang-chu');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('form-login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard'); //DashBoard
Route::resource('categories', 'Admin\CategoryController'); //Category
Route::resource('products', 'Admin\ProductController'); //Product

Route::get('/san-pham', 'ProductController@index')->name('san-pham');
Route::get('/san-pham/{id}/products', 'ProductController@showProductWithCate')->name('xem-san-pham');
Route::get('/dang-nhap', 'LoginController@create')->name('dang-nhap');
Route::get('/gioi-thieu', 'PageController@about')->name('gioi-thieu');


