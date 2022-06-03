<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookshelfController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', fn () => view('dashboard'))->name('dashboard');

    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{slug}', [BookController::class, 'show'])->name('books.show');

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{book}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    Route::get('/bookshelf', [BookshelfController::class, 'index'])->name('bookshelf.index');
    Route::post('/bookshelf/{book}', [BookshelfController::class, 'store'])->name('bookshelf.store');
    Route::patch('/bookshelf/{book}', [BookshelfController::class, 'update'])->name('bookshelf.update');
    Route::delete('/bookshelf/{id}', [BookshelfController::class, 'destroy'])->name('bookshelf.destroy');

});

require __DIR__.'/auth.php';
