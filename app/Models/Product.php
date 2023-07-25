<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'product_features',
        'logo',
        'slug',
        'price',
        'campaign_id',
        'category_id',
        'discount',
        'is_deleted',
        'admin_id',
        'is_approved'
    ];
}
