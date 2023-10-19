<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\DeliveryBoysController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubsController;
use App\Http\Controllers\FastFoodController;
use App\Http\Controllers\FastFoodSubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('login');})->name('login');
Route::post('/login',[LoginController::class,'userlogin'])->name('userlogin');
Route::get('/logout',[LoginController::class,'logout'])->name('userlogout');
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
Route::get('/foodindex',[FoodController::class,'index'])->name('food.index');
Route::get('/foodcreate',[FoodController::class,'create'])->name('food.create');
Route::post('/foodstore',[FoodController::class,'store'])->name('food.store');
Route::get('/foodedit/{id}',[FoodController::class,'edit'])->name('food.edit');
Route::post('/foodupdate',[FoodController::class,'update'])->name('food.update');
Route::get('/fooddelete/{id}',[FoodController::class,'delete'])->name('food.delete');
Route::get('/dbindex',[DeliveryBoysController::class,'index'])->name('db.index');
Route::get('/dbcreate',[DeliveryBoysController::class,'create'])->name('db.create');
Route::post('/dbstore',[DeliveryBoysController::class,'store'])->name('db.store');
Route::get('/dbedit/{id}',[DeliveryBoysController::class,'edit'])->name('db.edit');
Route::post('/dbupdate',[DeliveryBoysController::class,'update'])->name('db.update');
Route::get('/dbdelete/{id}',[DeliveryBoysController::class,'delete'])->name('db.delete');
Route::get('/subsindex',[SubsController::class,'index'])->name('subs.index');
Route::get('/subscategories/{id}',[SubsController::class,'categories'])->name('subs.categories');
Route::get('/subsproducts/{id}',[SubsController::class,'products'])->name('subs.products');
Route::get('/subsproducts/{id}/create',[SubsController::class,'addproduct'])->name('subproducts.create');
Route::post('/createproduct',[SubsController::class,'store'])->name('subproducts.store');
Route::get('/editproduct/{id}',[SubsController::class,'editproduct'])->name('subproducts.edit');
Route::post('/updateproduct',[SubsController::class,'updateproduct'])->name('subproducts.update');
Route::get('/deleteproduct/{id}',[SubsController::class,'deleteproduct'])->name('subproducts.delete');
Route::get('/fastfoodindex',[FastFoodController::class,'index'])->name('fastfood.index');
Route::get('/fastfoodcreate',[FastFoodController::class,'create'])->name('fastfood.create');
Route::post('/fastfoodstore',[FastFoodController::class,'store'])->name('fastfood.store');
Route::get('/fastfoodedit/{id}',[FastFoodController::class,'edit'])->name('fastfood.edit');
Route::post('/fastfoodupdate',[FastFoodController::class,'update'])->name('fastfood.update');
Route::get('/fastfooddelete/{id}',[FastFoodController::class,'delete'])->name('fastfood.delete');
Route::get('/fastfoodsubcategoryindex',[FastFoodSubCategoryController::class,'index'])->name('fastfoodsubcategory.index');
Route::get('/fastfoodsubcategorycreate',[FastFoodSubCategoryController::class,'create'])->name('fastfoodsubcategory.create');
Route::post('/fastfoodsubcategorystore',[FastFoodSubCategoryController::class,'store'])->name('fastfoodsubcategory.store');
Route::get('/fastfoodsubcategoryedit/{id}',[FastFoodSubCategoryController::class,'edit'])->name('fastfoodsubcategory.edit');
Route::post('/fastfoodsubcategoryupdate',[FastFoodSubCategoryController::class,'update'])->name('fastfoodsubcategory.update');
Route::get('/fastfoodsubcategorydelete/{id}',[FastFoodSubCategoryController::class,'delete'])->name('fastfoodsubcategory.delete');

Route::get('/addressindex',[AddressController::class,'index'])->name('address.index');
Route::get('/addresscreate',[AddressController::class,'create'])->name('address.create');
Route::post('/addressstore',[AddressController::class,'store'])->name('address.store');
Route::get('/addressedit/{id}',[AddressController::class,'edit'])->name('address.edit');
Route::post('/addressupdate',[AddressController::class,'update'])->name('address.update');
Route::get('/addressdelete/{id}',[AddressController::class,'delete'])->name('address.delete');