<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Wishlist extends Model
{
    protected $table = 'wishlists';

    protected $guarded = [];
}
