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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Route::view('/', 'landing-page');
// Route::get('/', 'LandingPageController@index')->name('landing-page');
Route::view('/shop', 'shop');
Route::view('/product', 'product');
Route::view('/cart', 'cart');
Route::view('/checkout', 'checkout');
Route::view('/thankyou', 'thankyou');

//landing page
Route::get('/', 'LandingPageController@index')->name('landing-page');
//shop page
Route::get('/shop','ShopController@index')->name('shop.index');
//product page
Route::get('/shop/{product}','ShopController@show')->name('shop.show');

