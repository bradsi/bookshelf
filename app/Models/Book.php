<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    /**
     * The author(s) that have written this book.
     * @return BelongsToMany
     */
    public function authors(): BelongsToMany {
        return $this->belongsToMany(Author::class);
    }

    /**
     * The publisher that has published this book.
     * @return HasOne
     */
    public function publisher(): HasOne {
        return $this->hasOne(Publisher::class);
    }
}
