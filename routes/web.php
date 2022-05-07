<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/products', 'HomeController@showProducts')->name('products');
Route::get('/about', 'HomeController@showAbout')->name('about');
Route::get('/compare', 'HomeController@showCompare')->name('compare');
Route::get('/category/show', 'HomeController@showCategory')->name('category.show');
Route::get('/farm/show', 'HomeController@showFarm')->name('farm.show');
Route::get('/search','HomeController@search')->name('search');


Route::middleware(['guest:admin', 'guest:user', 'guest:farm'])->group(function () {
    Route::get('/admin/login', 'AdminController@showLogin')->name('admin.login');
    Route::get('/user/login', 'UserController@showLogin')->name('user.login');
    Route::get('/user/register', 'UserController@showRegister')->name('user.register');
    Route::get('/farm/login', 'FarmController@showLogin')->name('farm.login');

});

Route::middleware(['auth:admin'])->name('admin.')->prefix('admin')->group(function () {

    Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
    Route::get('/profile','AdminController@profile')->name('profile');
    Route::get('/settings','AdminController@settings')->name('settings');
    Route::get('/logout','AdminController@logout')->name('logout');

    Route::get('/orders','AdminController@showOrders')->name('orders');


    Route::get('/farms','FarmController@index')->name('farms');
    Route::get('/farms/create','FarmController@create')->name('farms.create');
    Route::get('/farms/edit','FarmController@edit')->name('farms.edit');
    Route::get('/farms/delete','FarmController@delete')->name('farms.delete');

    Route::get('/categories','CategoryController@index')->name('categories');
    Route::get('/categories/create','CategoryController@create')->name('categories.create');
    Route::get('/categories/edit','CategoryController@edit')->name('categories.edit');
    Route::get('/categories/delete','CategoryController@delete')->name('categories.delete');
});

Route::middleware(['auth:farm'])->name('farm.')->prefix('farm')->group(function () {
    Route::get('/profile','FarmController@profile')->name('profile');
    Route::get('/settings','FarmController@settings')->name('settings');
    Route::get('/logout','FarmController@logout')->name('logout');


    Route::get('/products','ProductController@index')->name('products');
    Route::get('/products/create','productController@create')->name('products.create');
    Route::get('/products/edit','ProductController@edit')->name('products.edit');
    Route::get('/products/show','ProductController@show')->name('products.show');
    Route::get('/products/delete','ProductController@delete')->name('products.delete');

    Route::get('/orders','FarmController@showOrders')->name('orders');

});

Route::middleware(['auth:user'])->name('user.')->prefix('user')->group(function () {
    Route::get('/profile','UserController@profile')->name('profile');
    Route::get('/settings','UserController@settings')->name('settings');
    Route::get('/logout','UserController@logout')->name('logout');
    Route::get('/buy','UserController@buyProduct')->name('buy');
    Route::get('/orders','UserController@showOrders')->name('orders');
    Route::get('/order/del','UserController@delOrder')->name('order.del');
    Route::get('/cart','UserController@showCart')->name('cart');
    Route::get('/carts','UserController@showCarts')->name('carts');
    Route::get('/cart/checkout','UserController@checkout')->name('checkout');


});

