<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Builder
 */
class Publisher extends Model
{
    use HasFactory;

    /**
     * The books that this publisher has published.
     */
    public function books(): HasMany {
        return $this->hasMany(Book::class);
    }
}
