<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryMovement extends Model
{
    protected $fillable = ['product_id', 'type', 'quantity', 'reason', 'reference_number'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}