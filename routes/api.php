<?php
namespace App\Http\Resources;

use Illuminate\Support\Facades\Route;

Route::auth();

Route::apiResource("v1/products", "ProductsController");
Route::apiResource("v1/category", "CategoryController");
Route::apiResource("v1/stores", "StoresController");
Route::apiResource("v1/storesproducts", "StoreProductsController");
Route::apiResource("v1/users", "UserController");
Route::apiResource("v1/orders", "OrdersController");
Route::apiResource("v1/orderdetails", "OrderDetailsController");
Route::apiResource("v1/userTypes", "UserTypeController");
Route::apiResource("v1/cart", "cartController");

Route::get('v1/cartByStoreProductId/{storeProductId}', 'CartController@cartByStoreProductId');
Route::get('v1/cartByUserId/{userid}', 'CartController@cartByUserId');
Route::get('v1/getbystrore/{storeid}', 'StoreProductsController@getbystore');
Route::get('v1/getbyCatStore/{storeid}/{catid}', 'StoreProductsController@getbyCatStore');
