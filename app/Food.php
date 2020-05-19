<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'name', 'stock', 'unit', 'calories_per_unit', 'categories'
    ];

    
}

