<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'pro_id',
        'qty',
        'price',
        'user_ip',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'pro_id');
    }
}
