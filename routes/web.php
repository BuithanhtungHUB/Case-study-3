<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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


Route::get('/', [CartController::class, 'showHome'])->name('shop.home');
Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'showFormLogin'])->name('admin.showFromlogin');
    Route::get('dashboard', [LoginController::class, 'showDashboard'])->name('admin.dashboard');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
    Route::get('create', [UserController::class, 'create'])->name('users.create');
    Route::post('create', [UserController::class, 'store'])->name('users.store');

    Route::middleware(['auth'])->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'showDashboard'])->name('admin.showDashboard');
            Route::get('list', [UserController::class, 'index'])->name('users.index');
            Route::get('{id}/delete', [UserController::class, 'delete'])->name('users.delete');
            Route::get('update/{id}', [UserController::class, 'edit'])->name('users.edit');
            Route::post('update/{id}', [UserController::class, 'update'])->name('users.update');
        });
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('product.list');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/create', [ProductController::class, 'store'])->name('product.store');
            Route::get('/update/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
        });
        Route::prefix('brand')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('brand.list');
            Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
            Route::post('/create', [BrandController::class, 'store'])->name('brand.store');
            Route::get('/update/{id}', [BrandController::class, 'edit'])->name('brand.edit');
            Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
            Route::get('/delete/{id}', [BrandController::class, 'destroy'])->name('brand.delete');
        });
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category.list');
            Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/update/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
            Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
        });
    });
});
Route::prefix('shop')->group(function () {

    Route::get('/list', [CartController::class, 'index'])->name('shop.list');
    Route::get('/cart', [CartController::class, 'cart'])->name('shop.cart');
    Route::get('/addToCart/{id}', [CartController::class, 'addToCart'])->name('shop.addToCart');
    Route::get('/deleteCart/{id}', [CartController::class, 'deleteCart'])->name('shop.deleteCart');
    Route::get('/quantity/{id}', [CartController::class, 'quantity'])->name('shop.quantity');
    Route::get('/search/{value}', [ProductController::class, 'search'])->name('shop.search');
    Route::get('/filterCategory/{id}', [ProductController::class, 'filterCategory']);
    Route::get('/filterBrand/{id}', [ProductController::class, 'filterBrand']);
    Route::get('/detail/{id}', [ProductController::class, 'detailProduct'])->name('product.detail');
    Route::get('/filterPrice/{last}', [ProductController::class, 'filterPrice']);
    Route::get('/profile/{id}', [UserController::class, 'profileUser'])->name('user.profile');
    Route::post('/profile/{id}', [UserController::class, 'editProfile'])->name('user.editProfile');
    Route::get('/productLike/{id}', [ProductController::class, 'addLike'])->name('like');
    Route::get('/payment', [PaymentController::class, 'create'])->name('create.payment');
    Route::post('/payment', [PaymentController::class, 'store'])->name('store.pay');
    Route::get('/payment/list', [PaymentController::class, 'getList'])->name('payment.list');
});
