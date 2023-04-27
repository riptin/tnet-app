<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function product_group_items()
    {
        return $this->hasMany(ProductGroupItem::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
