<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed reviews
 */
class Product extends Model
{
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
