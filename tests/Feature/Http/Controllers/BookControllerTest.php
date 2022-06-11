<?php

use App\Models\Book;

// Method: index

it('will redirect unauthenticated users to login page when trying to view all books', function () {
   $this->get(route('books.index'))->assertRedirect('/login');
});

it('shows all books to authenticated users', function () {
    login();

    $this->get(route('books.index'))->assertOk();
});

// Method: show

it('will redirect unauthenticated users to login page when trying to view a specific book', function () {
    $book = Book::factory()->create();

    $this->get(route('books.show', $book->slug))->assertRedirect('/login');
});

it('shows a specific book to authenticated users', function () {
    $book = Book::factory()->create();

    login();

    $this->get(route('books.show', $book->slug))->assertOk();
});

it('will return a 404 if a specific book is not found', function () {
    login();

    $this->get(route('books.show', 'foobar'))->assertNotFound();
});
