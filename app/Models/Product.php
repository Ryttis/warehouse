<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = ['name', 'ean', 'type', 'weight', 'color', 'active', 'image'];

    public function price()
    {
        return $this->hasMany('App\Models\Price');
    }

    public function quantity()
    {
        return $this->hasMany('App\Models\Quantity');
    }

    public function details()
    {
        return $this->hasMany('App\Models\Details');
    }
}
