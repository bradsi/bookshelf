<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin Builder
 */
class Book extends Model
{
    use HasFactory;

    protected $casts = [
        'publish_date' => 'datetime',
    ];

    /**
     * The author(s) that have written this book.
     * @return BelongsToMany
     */
    public function authors(): BelongsToMany {
        return $this->belongsToMany(Author::class);
    }

    /**
     * The publisher that has published this book.
     * @return BelongsTo
     */
    public function publisher(): BelongsTo {
        return $this->belongsTo(Publisher::class);
    }
}
