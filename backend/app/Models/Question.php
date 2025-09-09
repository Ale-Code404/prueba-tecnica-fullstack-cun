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

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function isCorrect(string $answer): bool
    {
        return $this->correct_option == $answer;
    }
}
