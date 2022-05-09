<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function store(Book $book)
    {
        $duplicate_check = Wishlist::where('user_id', auth()->id())->where('book_id', $book->id)->first();

        if ($duplicate_check) {
            dd("book already added to wishlist with book id equals $duplicate_check->book_id");
        }

        $wishlist_item = Wishlist::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
        ]);

        dd("wishlist item created with user id $wishlist_item->user_id and book id $wishlist_item->book_id");
    }
}
