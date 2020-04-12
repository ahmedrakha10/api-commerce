<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['review','customer_name','star'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
