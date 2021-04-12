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

Route::redirect('/', '/en' );


Route::group(['prefix' => '{language}'],
    function () {

        Route::get('/', function () {
            return view('welcome');
        })->name('welcome');

   Route::middleware(['auth'])->group(

            function () {

                Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

                Route::resource('product', ProductController::class);

                Route::resource('color', ColorController::class);

                Route::get('{product}/product/edit', [ProductController::class, 'edit'])->name('product.edit');

                Route::get('history/prices', [HistoryController::class, 'prices'])->name('history-prices');
                Route::get('history/quantities', [HistoryController::class, 'quantities'])->name('history-quantities');
                Route::get('history/trashed', [HistoryController::class, 'trashed'])->name('history-trashed');
                Route::post('history/restore', [HistoryController::class, 'restore'])->name('history-restore');

                Route::resource('history', HistoryController::class)->except(
                    [
                        'create',
                        'store',
                        'update',
                        'show',
                    ]
                );

        require __DIR__.'/auth.php';
            }
        );
    }
);
