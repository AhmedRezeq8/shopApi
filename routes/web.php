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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

 Route::get('/products', 'ProductsController@webindex')->name('products');

// // API ROUTES
//  Route::apiResource("api/v1/products", "ProductsController");
//  Route::apiResource("api/v1/categories", "CategoryController");
//  Route::apiResource("api/v1/stores", "StoresController");
//  Route::apiResource("api/v1/storesproducts", "StoreProductsController");
//  Route::apiResource("api/v1/orders", "OrdersController");
