<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\OutliteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home');

// Route::get('/product',[LandingController::class,'index'])->name('product');

// Route::get('/adm-login',[AuthController::class,'login_page'])->name('login_page')->middleware('guest');
// Route::post('/login',[AuthController::class,'login'])->name('login')->middleware('guest');

// Route::post('/getProduk',[LandingController::class,'getProduk'])->name('getProduk');

// Route::post('/addCart',[LandingController::class,'addCart'])->name('addCart');

// Route::get('/loadCart',[LandingController::class,'loadCart'])->name('loadCart');

// Route::get('/loadCount',[LandingController::class,'loadCount'])->name('loadCount');

// Route::get('/cart',[CartController::class,'index'])->name('cart');

// Route::get('/loadTableCart',[CartController::class,'loadTableCart'])->name('loadTableCart');

// Route::post('/plusQty',[CartController::class,'plusQty'])->name('plusQty');

// Route::post('/minQty',[CartController::class,'minQty'])->name('minQty');

// Route::get('/subtotal',[CartController::class,'subtotal'])->name('subtotal');

// Route::get('/about',[AboutController::class,'index'])->name('about');

// Route::get('/contact',[ContactController::class,'index'])->name('contact');

// // Route::get('/authentication',[CheckController::class,'index'])->name('check');

// // Route::post('/check-no',[CheckController::class,'checkNo'])->name('checkNo');

// Route::get('/check-auth',[CheckController::class,'checkAuth'])->name('checkAuth');

// Route::post('/get-costumer',[CheckController::class,'getDataUser'])->name('getDataUser');

// Route::post('verification', [CheckController::class,'verifikasi'])->name('verification');

// Route::post('/check-otp', [CheckController::class,'checkOtp'])->name('checkOtp');

// Route::get('/transaksi', [TransaksiController::class,'index'])->name('transaksi');

// Route::post('/checkout',[TransaksiController::class,'checkOut'])->name('checkOut');

// Route::get('/redirect-transaksi',[TransaksiController::class,'redirectTransaksi'])->name('redirectTransaksi');

// Route::get('/checkout',[TransaksiController::class,'redirectCheckout'])->name('redirectCheckout');

// Route::post('/detail',[TransaksiController::class,'detail'])->name('detail');
 
// Route::get('/',[HomeController::class,'index'])->name('home');

// Route::get('/outlite',[OutliteController::class,'index'])->name('outlite');

// Route::get('refresh-token',[HomeController::class,'refreshToken'])->name('refreshToken');