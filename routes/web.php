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
Route::get('/', [\App\Http\Controllers\GetController::class, 'GetIndex'])->name('index');
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
Route::get('/admin', [\App\Http\Controllers\GetController::class, 'GetAdmin'])->middleware('AdminCheck')->name('admin');
Route::get('/search', [\App\Http\Controllers\GetController::class, 'GetSearch'])->name('search');

Route::get('/type/{id}', [\App\Http\Controllers\GetController::class, 'GetType'])->name('typePage');
Route::get('/type/{id}/{product_id}', [\App\Http\Controllers\GetController::class, 'GetProduct'])->name('productPage');

Route::get('/profile', [\App\Http\Controllers\GetController::class,'GetProfile'])->middleware('isAuth')->name('profile');

Route::name('auth.')->group(function(){
    Route::post('/registerNewUser', [\App\Http\Controllers\AuthController::class,'registerNewUser'])->name('registerNewUser');
    Route::post('/loginUser', [\App\Http\Controllers\AuthController::class,'loginUser'])->name('loginUser');
    Route::get('/logoutUser', [\App\Http\Controllers\AuthController::class,'logoutUser'])->name('logoutUser');
});

Route::name('product.')->middleware('AdminCheck')->group(function(){
    Route::post('/newType', [\App\Http\Controllers\ProductsController::class, 'newType'])->name('newType');
    Route::post('/newProduct', [\App\Http\Controllers\ProductsController::class, 'newProduct'])->name('newProduct');
});

Route::post('/newComment',[\App\Http\Controllers\ProductsController::class, 'newComment'])->middleware('isAuth')->name('newComment');

Route::name('cart.')->middleware('isAuth')->group(function(){
    Route::get('/addToCart', [\App\Http\Controllers\ProductsController::class, 'addToCart'])->name('addToCart');
    Route::get('/deleteFromCart/{id}', [\App\Http\Controllers\ProductsController::class, 'deleteFromCart'])->name('deleteFromCart');

    Route::get('/addToFavs', [\App\Http\Controllers\ProductsController::class, 'addToFavs'])->name('addToFavs');
    Route::get('/deleteFromFavs/{id}', [\App\Http\Controllers\ProductsController::class, 'deleteFromFavs'])->name('deleteFromFavs');

    Route::get('/cart',[\App\Http\Controllers\GetController::class, 'GetCart'])->name('GetCart');
    Route::get('/favs',[\App\Http\Controllers\GetController::class, 'GetFavs'])->name('GetFavs');
});
Route::name('orders.')->middleware('isAuth')->group(function(){
    Route::get('/pageOrder', [\App\Http\Controllers\OrdersController::class, 'pageOrder'])->name('pageOrder');
    Route::post('/newOrder', [\App\Http\Controllers\OrdersController::class, 'newOrder'])->name('newOrder');
});
