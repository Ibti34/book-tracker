<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'year',
        'description',
        'status',
        'pages',
        'current_page',
        'rating',
        'cover_path',
        'notes',
        'priority',
        'read_date',
        'tags',
    ];
}
