<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        return view('wishlist.index', [
            'wishlist' => Wishlist::with('book')->where('user_id', auth()->id())->paginate(10),
        ]);
    }

    public function store(Book $book): void
    {
        $duplicate_check = Wishlist::where('user_id', auth()->id())->where('book_id', $book->id)->first();

        if ($duplicate_check) {
            dd("book already added to wishlist with book id equals $duplicate_check->book_id");
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
        ]);

        dd('wishlist item created with user id ' . auth()->id() . 'and book id ' . $book->id);
    }

    public function destroy(int $id)
    {
        Wishlist::destroy($id);

        return redirect()->route('wishlist.index');
    }
}
