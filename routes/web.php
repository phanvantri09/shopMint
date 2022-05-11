<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DistanceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
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

Route::prefix('/')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    }); 
    Route::controller(ProductController::class)->group(function () {
        Route::post('search', 'search')->name('search');
        Route::get('/category/{id}', 'list')->name('category');
        Route::get('/product/{id}', 'product')->name('product');
    });
    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'mycart')->name('home.mycart');
        Route::get('/addcart/{id_user}/{id_product}', 'add')->name('home.addcart');
        Route::get('/updatecart', 'update')->name('home.updatecart');
        
        Route::get('/updatecart/ádasd/asda/{id_user}/{id_product}', 'tru')->name('home.trucart');
        Route::get('/delete/{id}', 'delete')->name('home.deleteCart');
    }); 
    Route::controller(BillController::class)->group(function () {
        Route::get('/bookingpay', 'pay')->name('home.pay');
    });
    Route::controller(EmergencyController::class)->group(function () {
        Route::get('/emergency', 'add')->name('emergency');
        Route::post('/emergency', 'postadd')->name('postemergency');
    });
    Route::controller(UserController::class)->group(function () { 
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::post('/postlogin', 'postlogin')->name('postlogin');
        Route::post('/postregister', 'postregister')->name('postregister');
    }); 
    Route::controller(BillController::class)->group(function () { 
        Route::get('/booking', 'booking')->name('booking');
        Route::post('/bookingPost', 'postbooking')->name('postbooking');
    }); 
    Route::controller(BookController::class)->group(function () { 
        Route::get('/bookingnow', 'add')->name('booknow');
        Route::post('/bookingPostnow/ádasdasd', 'postadd')->name('postbooknow');
    }); 
});