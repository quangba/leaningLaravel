<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('products')->name('product.')->group(function() {
    // Route::resource('/', ProductController::class);
    Route::get('/', [ProductController::class, 'index'])->name('index');

    // Route::get('/create', [ProductController::class, 'create'])->name('create');
    // Route::post('/store', [ProductController::class, 'store'])->name('store');

    // Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
    // Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    // Route::put('update/{id}', [ProductController::class, 'update'])->name('update');

    // Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');
});
