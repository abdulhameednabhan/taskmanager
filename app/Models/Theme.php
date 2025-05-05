<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{  protected $fillable = ['name', 'folder', 'default_sections'];

    protected $casts = [
        'default_sections' => 'array',
    ];
    //
}
