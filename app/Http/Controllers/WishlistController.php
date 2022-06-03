<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;

class WishlistController extends Controller
{
    public function index()
    {
        return view('wishlist.index', [
            'wishlist' => Wishlist::with('book')->where('user_id', auth()->id())->paginate(10),
        ]);
    }

    public function store(Book $book): RedirectResponse
    {
        $already_on_wishlist = Wishlist::where('user_id', auth()->id())->where('book_id', $book->id)->first();

        if ($already_on_wishlist) {
            session()->flash('flash_data', [
                'type' => 'info',
                'title' => 'Already on Wishlist',
                'message' => 'This book is already on your Wishlist. No further action has been taken.',
            ]);

            return redirect()->route('books.index');
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
        ]);

        session()->flash('flash_data', [
            'type' => 'success',
            'title' => 'Added to Wishlist',
            'message' => 'Book successfully added to your Wishlist.',
        ]);

        return redirect()->route('books.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        Wishlist::destroy($id);

        session()->flash('flash_data', [
            'type' => 'success',
            'title' => 'Removed from Wishlist',
            'message' => 'Book successfully removed from your Wishlist.',
        ]);

        return redirect()->route('wishlist.index');
    }
}
