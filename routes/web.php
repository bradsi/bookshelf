<?php

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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/', fn () => view('dashboard'))->name('dashboard');

    Route::get('/books', fn () => view('books.index'))->name('books.index');

    Route::get('/wishlist', fn () => view('wishlist.index'))->name('wishlist.index');

    Route::get('/bookshelf', fn () => view('bookshelf.index'))->name('bookshelf.index');

});

require __DIR__.'/auth.php';
