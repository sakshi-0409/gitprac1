<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\manufacturerContoller;
use App\Http\Controllers\productsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [indexController::class, 'index']);
Route::get('/catalogue', [indexController::class, 'catalogue']);
Route::get('/product/{id}', [indexController::class, 'product']);
Route::get('/category', [indexController::class, 'category']);
Route::get('/search', [indexController::class, 'search']);
Route::get('/about', [indexController::class, 'about']);
Route::get('/contact', [indexController::class, 'contact']);
Route::post('/contact', [indexController::class, 'customerContact']);
Route::get('/user', [indexController::class, 'user']);
Route::get('/buy/{id}', [indexController::class, 'buy']);
Route::get('/viewcart', [indexController::class, 'viewcart']);
Route::get('/cart', [indexController::class, 'cart'])->name('add-cart');
Route::get('/removecart', [indexController::class, 'removecart'])->name('removecart');
Route::get('/showwishlist', [indexController::class, 'showwishlist']);
Route::get('/wishlist', [indexController::class, 'wishlist'])->name('wishlist');
Route::get('/removewishlist', [indexController::class, 'removewishlist'])->name('removewishlist');
Route::get('/removecatwish', [indexController::class, 'removecatwish'])->name('removecatwish');
Route::get('/checkout', [indexController::class, 'checkout'])->name('checkout');

Route::group(['middleware'=>'admin'],function(){
    
    Route::get('/index', [dashboardController::class,'index']);
    Route::get('/operation', [dashboardController::class,'operation']);
    Route::post('/add-manufacturer', [manufacturerContoller::class, 'store'])->name('add-manufacturer');
    Route::post('/add-product', [productsController::class, 'store'])->name('add-product');
    Route::get('/edit/{id}', [productsController::class, 'edit']);
    Route::post('/update/{id}', [productsController::class, 'update']);
    Route::get('/delete', [productsController::class, 'delete'])->name('delete');
    Route::get('/trendings', [productsController::class,'trending'])->name('trendings');
    Route::get('/trending', [productsController::class,'showtrending']);
    Route::get('/remove', [productsController::class,'removetrending'])->name('remove');
    Route::get('/add-new-manufacturer', [dashboardController::class,'add_new_manufacturer'])->name('add-new-manufacturer');
    Route::get('/add-new-product', [dashboardController::class,'add_new_product']);
    Route::post('/order', [productsController::class, 'order'])->name('order');
    Route::get('/view-orders', [productsController::class, 'vieworder'])->name('vieworder');
    Route::post('/delivered', [productsController::class, 'delivered'])->name('delivered');
    Route::get('/view-delivered-orders', [productsController::class, 'view_delivered_orders'])->name('view-delivered-orders');
    
});


Route::get('/dashboard', [indexController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
