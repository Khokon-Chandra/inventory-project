<?php

use App\Http\Controllers\AgentController;
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
        Route::resource('products', ProductController::class)->except('show');
        Route::resource('product_types', ProductTypeController::class)->except('show');
        Route::resource('categories', CategoryController::class)->except('show');

        //print products
        Route::get('/products/print',[ProductController::class,'printProduct'])->name('productPrinter');
        /**
         * Insert Multiple data to model Route
         */

        Route::get('product_types/multiple/create',[ProductTypeController::class,'createMultiple'])->name('product_types.multiple.create');
        Route::post('product_types/multiple/store',[ProductTypeController::class,'storeMultiple'])->name('product_types.multiple.store');
        Route::get('categories/multiple/create',[CategoryController::class,'createMultiple'])->name('categories.multiple.create');
        Route::post('categories/multiple/store',[CategoryController::class,'storeMultiple'])->name('categories.multiple.store');
        Route::get('products/multiple/create',[ProductController::class,'createMultiple'])->name('products.multiple.create');
        Route::post('products/multiple/store',[ProductController::class,'storeMultiple'])->name('products.multiple.store');


        // delete multiple data
        Route::post('/product_types/delete-many',[ProductTypeController::class,'deleteMultiple'])->name('product_types.deleteMultiple');
        Route::post('/categories/delete-many',[CategoryController::class,'deleteMultiple'])->name('categories.deleteMultiple');
        Route::post('/products/delete-many',[ProductController::class,'deleteMultiple'])->name('products.deleteMultiple');

    });
    /**
     * agent modiule route goes here
     */
    Route::resource('agents', AgentController::class);
    Route::post('/agents/delete-many',[AgentController::class,'deleteMultiple'])->name('agents.deleteMultiple');
});



require __DIR__ . '/auth.php';
