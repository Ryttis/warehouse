<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\ColorController;

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

Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth'])->group(function(){
    Route::resource('product', ProductController::class);
    Route::post('product/edit/{product]', [ProductController::class,'edit']);
    Route::post('product/update/{product]', [ProductController::class,'update']);
    Route::resource('color', ColorController::class);
    Route::post('color/edit/{product]', [ColorController::class,'edit']);
    Route::post('colort/update/{product]', [ColorController::class,'update']);

//    Route::get('products/{id}/edit', 'ProductrController@edit')->name('product.edit');
});

//Route::get('/list', [ProductController::class,'index'])->middleware(['auth'])->name('list');
//Route::post('/edit/{product}', [ProductController::class,'edit'])->middleware(['auth'])->name('product.edit');;
//Route::get('/store', [ProductController::class,'store'])->middleware(['auth'])->name('store');
//Route::get('/update', [ProductController::class,'update'])->middleware(['auth'])->name('update');
//Route::delete('/delete', [ProductController::class,'destroy'])->middleware(['auth'])->name('delete');

Route::get('/dashboard', [ProductController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
