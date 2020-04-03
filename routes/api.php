<?php
namespace App\Http\Resources;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ProductCollection;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("api/v1/products", "ProductsController");
Route::apiResource("api/v1/category", "CategoryController");
Route::apiResource("api/v1/stores", "StoresController");
Route::apiResource("api/v1/storesproducts", "StoreProductsController");


