<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'brand_id',
        'pro_name',
        'pro_slug',
        'pro_code',
        'price',
        'saleof',
        'pro_quantity',
        'short_descrip',
        'long_descrip',
        'image_one',
        'image_two',
        'image_three',
        'status',
    ];

    public function category()
    {
        # this function gate category according to product category
        return $this->belongsTo(Category::class,'category_id');
    }
}
