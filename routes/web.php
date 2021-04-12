<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\ColorController;
use \App\Http\Controllers\HistoryController;

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

Route::get(
    '/',
    function () {
        return redirect('login');
    }
);

Route::middleware(['auth'])->group(
    function () {
        Route::resource('product', ProductController::class);
        Route::post('product/edit/{product]', [ProductController::class, 'edit']);
        Route::post('product/update/{product]', [ProductController::class, 'update']);
        Route::resource('color', ColorController::class);

//        Route::post('color/edit/{product]', [ColorController::class, 'edit']);
//        Route::post('color/update/{product]', [ColorController::class, 'update']);
        Route::get('product/prices', [ColorController::class, 'prices']);
        Route::get('product/quantities', [ColorController::class, 'quantities']);
        Route::get('product/details', [ColorController::class, 'details']);


        Route::get('history/prices', [HistoryController::class,'prices'])->name('history-prices');
        Route::get('history/quantities', [HistoryController::class,'quantities'])->name('history-quantities');
        Route::get('history/trashed', [HistoryController::class,'trashed'])->name('history-trashed');
        Route::post('history/restore', [HistoryController::class,'restore'])->name('history-restore');

        Route::resource('history', HistoryController::class)->except([
            'create', 'store', 'update','show'
        ]);
    }
);


Route::get('/dashboard', [ProductController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
