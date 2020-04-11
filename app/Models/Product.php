<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed reviews
 */
class Product extends Model
{
    protected $fillable = ['name', 'price', 'stock', 'details', 'discount'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
