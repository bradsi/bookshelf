<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        return view('books.index', [
            'books' => Book::paginate(10),
        ]);
    }

    public function show(string $slug) {
        return view('books.show', [
            'book' => Book::where('slug', '=', $slug)->firstOrFail(),
        ]);
    }
}
