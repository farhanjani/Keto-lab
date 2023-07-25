<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'product_id',
        'crm_id',
        'price',
        'discount',
        'is_featured',
        'description',
        'is_deleted',
        'admin_id',
        'is_approved'
    ];
    
}
