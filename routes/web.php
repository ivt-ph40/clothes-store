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
Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('form-register');
Route::post('/register', 'Auth\RegisterController@create')->name('register');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::group(['middleware' => 'is.admin'], function(){
        Route::get('search', 'DashboardController@search')->name('search'); //search 
        Route::post('autocomplete-ajax', 'DashboardController@autocompleteAjax')->name('autocomplete-ajax'); //search-autocomplete

        Route::get('/', 'DashboardController@index')->name('dashboard'); //DashBoard
        Route::resource('categories', 'CategoryController'); //Category
        Route::resource('products', 'ProductController'); //Product

        //edit product size
        Route::get('products/{id}/size', 'ProductController@productSize')->name('product.size');
        Route::get('products/{id}/sizes/{sizeId}/edit', 'ProductController@productSizeEdit')->name('product.size.edit');
        Route::put('products/{id}/sizes/{sizeId}/edit', 'ProductController@productSizeStore')->name('product.size.store');

        Route::resource('orders', 'OrderController'); //Order
        Route::put('order-status/{id}/edit', 'OrderController@orderStatusEdit')->name('order.status.edit');
        Route::get('status-filter', 'OrderController@orderStatusFilter')->name('order.status.filter');
        Route::get('status/dang-cho-xac-nhan', 'OrderController@orderStatus1')->name('order.status.1');
        Route::get('show-orders-cancelled', 'OrderController@showOrderCancel')->name('show.order.cancelled');

        Route::resource('comments', 'CommentController'); //Comment
        Route::resource('users', 'UserController'); //User
        Route::put('users/{id}/roles', 'UserController@updateRole')->name('user.role.store');
        Route::resource('slides', 'SlideController'); //Slide
    });
});


Route::get('/san-pham', 'ProductController@index')->name('san-pham');
Route::get('/san-pham/{id}', 'ProductController@showProductWithCate')->name('xem-san-pham');
Route::get('/dang-nhap', 'LoginController@create')->name('dang-nhap');
Route::get('/gioi-thieu', 'PageController@about')->name('gioi-thieu');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/detail/{id}', 'ProductController@productDetail')->name('detail');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/tim-kiem', 'ProductController@search')->name('search');
Route::post('/binh-luan', 'CommentController@store')->name('comment.store');
// Route::get('/home', 'HomeController@index')->name('home');
