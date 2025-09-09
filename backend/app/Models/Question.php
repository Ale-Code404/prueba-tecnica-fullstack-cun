<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Concerns\HasUuids,
    Factories\HasFactory,
    Model
};

class Question extends Model
{
    use HasFactory, HasUuids;

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
