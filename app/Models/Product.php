<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable = ['name', 'ean', 'type', 'weight','color','active','image'];

    public function price(){
        return $this->hasMany('App\Models\Price');
    }
}
