<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'available',
        'details',
        'farm_id',
        'category_id'
    ];


    public function farm() {
        return $this->belongsTo(Farm::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function carts() {
        return $this->belongsToMany(Cart::class,'orders','product_id')
                ->withPivot('qty')
                ->withTimestamps();
    }

    public function orders() {
        return $this->hasMany(Order::class,'product_id');
    }


}
