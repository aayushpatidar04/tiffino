<?php

use App\Http\Controllers\DeliveryBoysController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubsController;

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