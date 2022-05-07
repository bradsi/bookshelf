<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', fn () => view('dashboard'))->name('dashboard');

    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{slug}', [BookController::class, 'show'])->name('books.show');

    Route::get('/wishlist', fn () => view('wishlist.index'))->name('wishlist.index');

    Route::get('/bookshelf', fn () => view('bookshelf.index'))->name('bookshelf.index');

});

require __DIR__.'/auth.php';
