<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/', 'App\Http\Controllers\Client\HomeController@index')->name("home.index");



//Client routes
//Product
Route::get('/product/list', 'App\Http\Controllers\Client\ProductController@list')->name("product.list");
Route::get('/product/show/{id}', 'App\Http\Controllers\Client\ProductController@show')->name("product.show");
Route::get('/product/add/{id}', 'App\Http\Controllers\Client\ProductController@addToCart')->name('product.addToCart');
Route::get('/product/showCart', 'App\Http\Controllers\Client\ProductController@showCart')->name('product.showCart');
Route::get('/product/showCart/remove/{id}', 'App\Http\Controllers\Client\ProductController@deleteFromCart')
        ->name('product.deleteFromCart');
Route::get('/product/delete', 'App\Http\Controllers\Client\ProductController@deleteAllCart')
->name('product.deleteAllCart');
Route::get('/product/buy', 'App\Http\Controllers\Client\ProductController@buy')->name('product.buy');

// Product Reviews
Route::get('/review/create/{id}', 'App\Http\Controllers\Client\ProductController@review')->name('product.writeReview');
Route::post('/review/storeReview/{id}', 'App\Http\Controllers\Client\ProductController@storeReview')
        ->name('product.storeReview');

//User
Route::get('/user/create', 'App\Http\Controllers\Client\UserController@create')->name("user.create");
Route::post('/user/save', 'App\Http\Controllers\Client\UserController@save')->name("user.save");
Route::get('/user/show/{id}', 'App\Http\Controllers\Client\UserController@show')->name("user.show");
Route::post('/user/update/{id}', 'App\Http\Controllers\Client\UserController@update')
        ->name("user.update");


//Admin routes
//user
Route::delete('/admin/user/destroy/{id}', 'App\Http\Controllers\Admin\AdminUserController@destroy')
        ->name("admin.user.destroy");
Route::get('/admin/user/list', 'App\Http\Controllers\Admin\AdminUserController@list')->name("admin.user.list");
Route::post('/admin/user/update/{id}', 'App\Http\Controllers\Admin\AdminUserController@update')
        ->name("admin.user.update");
Route::post('/admin/user/save', 'App\Http\Controllers\AdminUserController@save')->name("admin.user.save");

//Product
Route::get('/admin/product/list', 'App\Http\Controllers\Admin\AdminProductController@list')->name("admin.product.list");
Route::get('/admin/product/create', 'App\Http\Controllers\Admin\AdminProductController@create')
        ->name("admin.product.create");
Route::post('/admin/product/save', 'App\Http\Controllers\Admin\AdminProductController@save')
        ->name("admin.product.save");
Route::post('/admin/product/update/{id}', 'App\Http\Controllers\Admin\AdminProductController@update')
        ->name("admin.product.update");
Route::delete('/admin/product/destroy/{id}', 'App\Http\Controllers\Admin\AdminProductController@destroy')
        ->name("admin.product.destroy");

// Tool Loan
Route::get('/admin/toolloan/list', 'App\Http\Controllers\Admin\AdminToolLoanController@list')
->name("admin.toolloan.list");
Route::get('/admin/toolloan/create', 'App\Http\Controllers\Admin\AdminToolLoanController@create')
->name("admin.toolloan.create");
Route::post('/admin/toolloan/save', 'App\Http\Controllers\Admin\AdminToolLoanController@save')
->name("admin.toolloan.save");
Route::post('/admin/toolloan/update/{id}', 'App\Http\Controllers\Admin\AdminToolLoanController@update')
->name("admin.toolloan.update");
Route::delete('/admin/toolloan/destroy/{id}', 'App\Http\Controllers\Admin\AdminToolLoanController@destroy')
->name("admin.toolloan.destroy");


//Language
Route::get('/language/{lan}', 'App\Http\Controllers\Client\HomeController@language')->name('home.language');
