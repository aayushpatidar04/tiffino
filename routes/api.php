<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\FastFoodController;
use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\SubsProductsController;
use App\Http\Controllers\API\AddressController;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('logout', [AuthController::class, 'logout']);
});
Route::get('/allfooditems',[FoodController::class, 'allfooditems']);
Route::post('/fooddetails',[FoodController::class, 'fooddetails']);
Route::post('/add_to_cart',[CartController::class, 'add_to_cart']);
Route::post('/cart',[CartController::class, 'cart']);

Route::post('/getallproducts',[SubsProductsController::class, 'getallproducts']);
Route::post('/getproductdetails',[SubsProductsController::class,'getproductdetails']);

Route::post('/getallfastfood',[FastFoodController::class, 'getallfastfood']);
Route::post('/getfastfooddetails',[FastFoodController::class,'getfastfooddetails']);

Route::post('/getaddressdetails',[AddressController::class,'getaddressdetails']);