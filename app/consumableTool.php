<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consumableTool extends Model
{
    protected $fillable = [
        'name', 'location', 'stock', 'notes'
    ];

}
