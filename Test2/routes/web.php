<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('test',['as'=>'test','uses'=>'App\Http\Controllers\ProductRepositoryController@index']);
Route::get('home',['as'=>'home','uses'=>'App\Http\Controllers\ProductsController@getIndex']);
Route::get('product_detail/{id}',['as'=>'product_detail','uses'=>'App\Http\Controllers\ProductsController@getProductDetail']);
Route::get('listing/{cat}/{order_by}',['as'=>'listing','uses'=>'App\Http\Controllers\ProductsController@listing']);
Route::get('ajax/{task}',['as'=>'ajax','uses'=>'App\Http\Controllers\ProductsController@ajax']);

//login
Route::prefix('login')->group(function () {
    Route::get('',['as'=>'login','uses'=>'App\Http\Controllers\UserController@getLogin']);
    Route::post('',['as'=>'postlogin','uses'=>'App\Http\Controllers\UserController@postLogin']);
});

//logout
Route::get('logout',['as'=>'logout','uses'=>'App\Http\Controllers\UserController@logout'])->middleware('auth');


//signup
Route::prefix('signup')->group(function () {
    Route::get('',['as'=>'signup','uses'=>'App\Http\Controllers\UserController@getSignUp']);
    Route::post('',['as'=>'postsignup','uses'=>'App\Http\Controllers\UserController@postSignUp']);
});


//cart
Route::prefix('cart')->group(function () {
    Route::get('',['as'=>'cart','uses'=>'App\Http\Controllers\CartController@getCart']);
    Route::get('/add/{id}/{qty}',['as'=>'add_to_cart','uses'=>'App\Http\Controllers\CartController@getAddToCart']);
    Route::post('/update',['as'=>'update_to_cart','uses'=>'App\Http\Controllers\CartController@updateToCart']);
    Route::get('/remove/{id}',['as'=>'remove_from_cart','uses'=>'App\Http\Controllers\CartController@removeFromCart']);
});

//checkout
Route::get('checkout',['as'=>'checkout','uses'=>'App\Http\Controllers\orderController@getCheckout'])->middleware('auth');
Route::post('checkout',['as'=>'checkout','uses'=>'App\Http\Controllers\OrderController@postCheckout'])->middleware('auth');

//account
Route::prefix('account')->middleware('auth')->group(function () {
    Route::get('',['as'=>'account','uses'=>'App\Http\Controllers\UserController@getAccount']);
    Route::post('/upload_avt',['as'=>'upload_avt','uses'=>'App\Http\Controllers\UserController@uploadAvt']);
    Route::get('/update_account',['as'=>'update_account','uses'=>'App\Http\Controllers\UserController@getUpdateAccount']);
    Route::post('/update_account',['as'=>'update_account','uses'=>'App\Http\Controllers\UserController@updateAccount']);
});