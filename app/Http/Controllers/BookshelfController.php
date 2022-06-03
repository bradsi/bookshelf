<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookshelf;
use Illuminate\Http\RedirectResponse;

class BookshelfController extends Controller
{
    public function index()
    {
        return view('bookshelf.index', [
            'wishlist' => Bookshelf::with('book')->where('user_id', auth()->id())->paginate(10),
        ]);
    }

    public function store(Book $book): RedirectResponse
    {
        $already_on_bookshelf = Bookshelf::where('user_id', auth()->id())->where('book_id', $book->id)->first();

        if ($already_on_bookshelf) {
            session()->flash('flash_data', [
                'type' => 'info',
                'title' => 'Already on Bookshelf',
                'message' => 'This book is already on your Bookshelf. No further action has been taken.',
            ]);

            return redirect()->route('bookshelf.index');
        }

        Bookshelf::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
        ]);

        session()->flash('flash_data', [
            'type' => 'success',
            'title' => 'Added to Bookshelf',
            'message' => 'Book successfully added to your Bookshelf.',
        ]);

        return redirect()->route('bookshelf.index');
    }

    public function update(Bookshelf $bookshelf): RedirectResponse
    {
        $bookshelf->update(['read' => !$bookshelf->read]);

        $new_status = $bookshelf->read === true ? 'read' : 'unread';

        session()->flash('flash_data', [
            'type' => 'success',
            'title' => 'Book Updated',
            'message' => "Book successfully updated to $new_status.",
        ]);

        return redirect()->route('bookshelf.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        Bookshelf::destroy($id);

        session()->flash('flash_data', [
            'type' => 'success',
            'title' => 'Removed from Bookshelf',
            'message' => 'Book successfully removed from your Bookshelf.',
        ]);

        return redirect()->route('bookshelf.index');
    }
}
