<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_ingredients')->withTimestamps();
    }
}

