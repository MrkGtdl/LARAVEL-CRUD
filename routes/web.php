<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('products',ProductController::class);
// Route::get('products', [ProductController::class,'index'])->name('products.index');
// Route::get('products-export', [ProductController::class,'export'])->name('products.export');
// Route::post('products-import', [ProductController::class,'import'])->name('products.import');

Route::controller(ProductController::class)->group(function(){
    Route::get('products', 'index')->name('products.index');
    Route::get('products/create', 'create')->name('products.create');
    Route::post('products', 'store')->name('products.store');
    Route::get('products/{product}', 'show')->name('products.show');
    Route::put('products/{product}', 'update')->name('products.update');
    Route::delete('products/{product}', 'destroy')->name('products.destroy');
    Route::get('products/{product}/edit', 'edit')->name('products.edit');
    Route::get('products-export', 'export')->name('products.export');
    Route::post('products-import', 'import')->name('products.import');
});