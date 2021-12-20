<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Inventory\CategoryController;
use App\Http\Controllers\Inventory\ProductController;
use App\Http\Controllers\Inventory\ProductTypeController;
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

Route::middleware(['auth'])->group(function () {
    //dashboard route goes here
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // module name : inventory // Route group for inventory module
    Route::prefix('inventory')->name('inventory.')->group(function () {
        Route::resource('products', ProductController::class);
        Route::resource('product_types', ProductTypeController::class);
        Route::resource('categories', CategoryController::class);
    });
});





require __DIR__ . '/auth.php';
