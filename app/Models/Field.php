<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'price',
        'slug',
        'contact_person',
        'is_promo',
        'promo_price'
    ];
}
