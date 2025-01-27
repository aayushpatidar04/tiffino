<?php

use App\Http\Controllers\API\PaymentController;
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
Route::post('/delete_from_cart',[CartController::class, 'delete_from_cart']);

Route::get('/getallproducts/{id}/{slug}',[SubsProductsController::class, 'getallproducts']);
Route::post('/getproductdetails',[SubsProductsController::class,'getproductdetails']);

Route::get('/getallfastfood',[FastFoodController::class, 'getallfastfood']);
Route::post('/getfastfooddetails',[FastFoodController::class,'getfastfooddetails']);

Route::post('/getaddressdetails',[AddressController::class,'getaddressdetails']);
Route::post('/saveaddressdetails',[AddressController::class,'saveaddressdetails']);

Route::get('/makePayment',[PaymentController::class,'makePayment']);

