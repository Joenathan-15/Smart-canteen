<?php

use App\Models\Cart;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

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
Route::middleware('guest')->group(function(){
    Route::get('/login',[AuthController::class,'view_login'])->name('login');
    Route::post('/login',[AuthController::class,'login']);
});

Route::middleware('auth')->group(function(){
    //Dashboard
    Route::get('/',[DashboardController::class,'index']);

    //logout
    Route::Post('/logout',[AuthController::class,'logout']);
    //sales view
    Route::get('/sales',[SalesController::class,'index']);
    //Topup
    Route::get('/topup',[CardController::class,'index']);
    Route::Post('/topup',[CardController::class,'topup']);
    //card
    Route::get('/card/create',[CardController::class,'create']);
    Route::post('/card/create',[CardController::class,'store']);
    Route::get('/card/{id}/delete',[CardController::class,'destroy']);
    Route::get('/card/{id}/edit',[CardController::class,'edit']);
    Route::Post('/card/{id}/edit',[CardController::class,'update']);

    //product
    Route::get('/product/create',[ProductController::class,'create']);
    Route::Post('/product/create',[ProductController::class,'store']);
    Route::get('/product/{id}/edit',[ProductController::class,'edit']);
    Route::post('/product/{id}/edit',[ProductController::class,'update']);
    Route::get('/product/{id}/delete',[ProductController::class,'destroy']);

    //cart system
    Route::post('/product/add/{id}',function($id){
        $newcart = new Cart();
        $newcart->product_id = $id;
        $newcart->user_id = Auth()->user()->id;
        $newcart->save();
    });
    Route::get('/cart/checkout',[CartController::class, 'index']);
    Route::Post('/cart/checkout',[CartController::class, 'pay']);
    Route::post('/cart/delete/{id}',[CartController::class, 'remove']);

    //new user
    Route::get('/user/create',[UserController::class,'create']);
    Route::Post('/user/create',[UserController::class,'store']);
});