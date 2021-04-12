<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public $fillable = ['price'];

    public function hasProduct()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
