<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    use HasFactory;

    public $fillable = ['quantity'];

    public function hasProduct()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
