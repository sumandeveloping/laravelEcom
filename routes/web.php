<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;

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
Route::get('/home', 'HomeController@index')->name('home');

// Route::view('/', 'landing-page');
// Route::get('/', 'LandingPageController@index')->name('landing-page');
// Route::view('/shop', 'shop');
// Route::view('/product', 'product');
// Route::view('/cart', 'cart');
// Route::view('/checkout', 'checkout');
// Route::view('/thankyou', 'thankyou');

//landing page
Route::get('/', 'LandingPageController@index')->name('landing-page');
// * Shop page Controller
Route::get('/shop','ShopController@index')->name('shop.index');
Route::get('/shop/{product}','ShopController@show')->name('shop.show');

// * Cart Controller
Route::get("/cart",'CartController@index')->name('cart.index');
Route::post("/cart",'CartController@store')->name('cart.store');
Route::patch('/cart/{product}','CartController@update')->name('cart.update'); // todo Cart qty update
Route::delete("/cart/{product}",'CartController@destroy')->name('cart.destroy');
Route::post("/cart/switchToSaveForLater/{product}",'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

// * saveForLater Controller 
Route::delete('/saveForLater/{product}', 'saveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}','saveForLaterController@switchToCart')->name('saveForLater.switchToCart');

// * Checkout Controller
Route::get('/checkout','CheckoutController@index')->name('checkout.index');
Route::post('/checkout','CheckoutController@store')->name('checkout.store');

// * Confirmation Controller
Route::get('/thankyou','ConfirmationController@index')->name('confirmation.index');

// * Coupons Controller 
Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

//empty 
Route::get('empty',function() {
    Cart::destroy();
    Cart::instance('saveForLater')->destroy();
    session()->forget(['coupon','discount']);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});