<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'product_ingredients')->withTimestamps();
    }
}
