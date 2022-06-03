<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin Builder
 *
 * @property int $user_id
 * @property int $book_id
 *
 */
class Bookshelf extends Model
{
    protected $table = 'bookshelves';

    protected $guarded = [];

    /**
     * The books that are on this bookshelf.
     */
    public function book(): HasOne
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }
}
