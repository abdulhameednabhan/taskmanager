<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
     protected $fillable = ['title', 'slug', 'theme', 'sections'];
    protected $casts = [
        'sections' => 'array',
    ];
}
