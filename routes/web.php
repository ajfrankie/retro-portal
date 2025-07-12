<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\CakeController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SizeController;

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

Auth::routes(['login' => false, 'logout' => false, 'verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about-us', [HomeController::class, 'index'])->name('about-us');

// Admin
Route::prefix('/admin')->group(function () {
    // Admin login routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');

    // Protected admin routes
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    });


    //category routes
    Route::prefix('/category')->middleware('auth')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
        Route::post('/deactivate/{id}', [CategoryController::class, 'deactivateCategory'])->name('admin.category.deactivate');
        Route::post('/activate/{id}', [CategoryController::class, 'activateCategory'])->name('admin.category.activate');
    });

    //cake routes
    Route::prefix('/cake')->middleware('auth')->group(function () {
        Route::get('/', [CakeController::class, 'index'])->name('admin.cake.index');
        Route::get('/create', [CakeController::class, 'create'])->name('admin.cake.create');
        Route::post('/store', [CakeController::class, 'store'])->name('admin.cake.store');
        Route::get('/edit/{id}', [CakeController::class, 'edit'])->name('admin.cake.edit');
        Route::put('update/{id}', [CakeController::class, 'update'])->name('admin.cake.update');
        Route::delete('delete/{id}', [CakeController::class, 'destroy'])->name('admin.cake.destroy');
        Route::post('/deactivate/{id}', [CakeController::class, 'deactivateCake'])->name('admin.cake.deactivate');
        Route::post('/activate/{id}', [CakeController::class, 'activateCake'])->name('admin.cake.activate');
    });


    //size routes
    Route::prefix('/size')->middleware('auth')->group(function () {
        Route::get('/', [SizeController::class, 'index'])->name('admin.size.index');
        Route::get('/create', [SizeController::class, 'create'])->name('admin.size.create');
        Route::post('/store', [SizeController::class, 'store'])->name('admin.size.store');
        Route::get('/edit/{id}', [SizeController::class, 'edit'])->name('admin.size.edit');
        Route::put('update/{id}', [SizeController::class, 'update'])->name('admin.size.update');
        Route::delete('delete/{id}', [SizeController::class, 'destroy'])->name('admin.size.destroy');
        Route::post('/deactivate/{id}', [SizeController::class, 'deactivateSize'])->name('admin.size.deactivate');
        Route::post('/activate/{id}', [SizeController::class, 'activateSize'])->name('admin.size.activate');
        
    });
});
