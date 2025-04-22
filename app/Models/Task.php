<?php

namespace App\Models;
use App\Enums\TaskStatus;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'assigned_to'];
    public function assignedEmployee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    //
}
