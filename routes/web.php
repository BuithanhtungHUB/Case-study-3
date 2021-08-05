<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('admin.users.update');
//});

Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'showFormLogin'])->name('admin.showFromlogin');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
    Route::get('create', [UserController::class, 'create'])->name('users.create');
    Route::post('create', [UserController::class, 'store'])->name('users.store');

    Route::middleware(['auth'])->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::get('{id}/delete', [UserController::class, 'delete'])->name('users.delete');
            Route::get('update/{id}',[UserController::class, 'edit'])->name('users.edit');
            Route::post('update/{id}',[UserController::class, 'update'])->name('users.update');
        });
        Route::get('logout',[LoginController::class, 'logout'])->name('admin.logout');

    });

});
