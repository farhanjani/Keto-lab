<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpsellProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'upsell_crm_id',
        'is_deleted',
        'description',
        'features',
        'btn_title',
        'image',
        'price',
        'discounted_price',
        "slug",
        'admin_id',
        'is_approved'
    ];
}
