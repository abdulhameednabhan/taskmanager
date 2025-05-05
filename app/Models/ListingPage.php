<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingPage extends Model
{
    protected $fillable = ['name', 'theme', 'sections'];

    protected $casts = [
        'sections' => 'array', 
    ];
}
