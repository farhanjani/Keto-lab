<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpsellAssignedProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'upsell_product_id',
        'upsell_key',
        'is_deleted'
    ];
}
