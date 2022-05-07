<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    protected $fillable = [
        'status',
        'total',
        'user_id',
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }


    public function Products() {
        return $this->belongsToMany(Product::class,'orders','cart_id')
                ->withPivot('qty')
                ->withTimestamps();
    }


    public function orders() {
        return $this->hasMany(Order::class,'cart_id');
    }
}
