<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('api.')->group(function () {
    Route::prefix('movies')->name('movies.')->group(function () {
        Route::get('/', [MoviesController::class, 'index'])->name('index');
        Route::post('/', [MoviesController::class, 'store'])->name('store');
        Route::get('/{id}', [MoviesController::class, 'detail'])->name('detail')->whereNumber('id');
        Route::patch('/{id}', [MoviesController::class, 'update'])->name('update')->whereNumber('id');
        Route::delete('/{id}', [MoviesController::class, 'delete'])->name('delete')->whereNumber('id');
    });
});
