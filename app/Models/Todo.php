<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'assigned_date', 'user_id', 'isDone'
    ];

    protected $casts = [
        'isDone' => 'boolean',
    ];
}
