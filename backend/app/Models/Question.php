<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'lesson_id',
        'sentence',
        'options',
        'correct_option'
    ];

    protected $casts = [
        'options' => 'array',
    ];
}
