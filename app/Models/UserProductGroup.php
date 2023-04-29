<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserProductGroup extends Model
{
    use HasFactory;

    protected $hidden = [
      'updated_at',
      'created_at',
      'products'
    ];

    protected $appends = [
      'product_ids'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_group_items', 'group_id', 'product_id');
    }

    public function getProductIdsAttribute()
    {
        return $this->products->pluck('id');
    }
}
