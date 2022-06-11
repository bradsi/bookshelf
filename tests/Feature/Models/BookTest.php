<?php

use App\Models\Book;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

test('a Book can belong to many Authors', function () {
    $book = Book::factory()->hasAuthors()->create();

    $relationship = $book->authors();

    expect( $relationship->exists() )->toBeTrue();

    $this->assertInstanceOf(BelongsToMany::class, $relationship);
});

test('a Book belongs to a Publisher', function () {
    $book = Book::factory()->hasPublisher()->create();

    $relationship = $book->publisher();

    expect( $relationship->exists() )->toBeTrue();

    $this->assertInstanceOf(BelongsTo::class, $relationship);
});
