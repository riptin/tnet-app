<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $hidden = [
      'updated_at',
      'created_at',
      'user_id'
    ];

    public function user_product_groups(): BelongsToMany
    {
        return $this->belongsToMany(UserProductGroup::class, 'product_group_items', 'product_id', 'group_id');
    }

    public function cart_users(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart', 'product_id', 'user_id',)
          ->as('cart')
          ->withPivot('quantity');
    }
}
