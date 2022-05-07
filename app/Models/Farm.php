<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Farm extends Authenticatable
{
    use HasFactory;

    protected $guard = 'farm';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'owner_image',
        'owner_name',
        'phone',
        'farms_logo',
        'details',
        'address',


    ];


    public function products() {
        return $this->hasMany(Product::class,'farm_id');
    }
}
