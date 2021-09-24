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
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

//Admin routes
//user
Route::delete('/admin/user/destroy/{id}', 'App\Http\Controllers\Admin\AdminUserController@destroy')->name("admin.user.destroy");
Route::get('/admin/user/list', 'App\Http\Controllers\Admin\AdminUserController@list')->name("admin.user.list");
//Product
Route::get('/admin/product/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name("admin.product.create");
Route::post('/admin/product/save', 'App\Http\Controllers\Admin\AdminProductController@save')->name("admin.product.save");
Route::get('/admin/product/list', 'App\Http\Controllers\Admin\AdminProductController@list')->name("admin.product.list");
Route::delete('/admin/product/destroy/{id}', 'App\Http\Controllers\Admin\AdminProductController@destroy')->name("admin.product.destroy");
Route::get('/admin/product/edit/{id}', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
Route::put('/admin/product/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");

// Tool Loan
Route::get('/admin/toolloan/list', 'App\Http\Controllers\Admin\AdminToolLoanController@list')->name("admin.toolloan.list");
Route::get('/admin/toolloan/edit/{id}', 'App\Http\Controllers\Admin\AdminToolLoanController@edit')->name("admin.toolloan.edit");
Route::put('/admin/toolloan/update', 'App\Http\Controllers\Admin\AdminToolLoanController@update')->name("admin.toolloan.update");
Route::delete('/admin/toolloan/destroy/{id}', 'App\Http\Controllers\Admin\AdminToolLoanController@destroy')->name("admin.toolloan.destroy");
Route::get('/admin/toolloan/create', 'App\Http\Controllers\Admin\AdminToolLoanController@create')->name("admin.toolloan.create");
Route::post('/admin/toolloan/save', 'App\Http\Controllers\Admin\AdminToolLoanController@save')->name("admin.toolloan.save");

//User routes
//Product
Route::get('/product/list', 'App\Http\Controllers\ProductController@list')->name("product.list");
Route::get('/product/show/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
Route::get('/product/add/{id}', 'App\Http\Controllers\ProductController@addToCart')->name('product.addToCart');
Route::get('/product/showCart', 'App\Http\Controllers\ProductController@showCart')->name('product.showCart');
Route::get('/product/delete', 'App\Http\Controllers\ProductController@deleteAllCart')->name('product.deleteAllCart');
Route::get('/product/buy', 'App\Http\Controllers\ProductController@buy')->name('product.buy');

//User
Route::get('/user/create', 'App\Http\Controllers\UserController@create')->name("user.create");
Route::post('/user/save', 'App\Http\Controllers\UserController@save')->name("user.save");
//Route::get('/user/list', 'App\Http\Controllers\UserController@list')->name("user.list");
Route::get('/user/show/{id}', 'App\Http\Controllers\UserController@show')->name("user.show");


//Language
Route::get('/language/{lan}', 'App\Http\Controllers\HomeController@language')->name('home.language');
