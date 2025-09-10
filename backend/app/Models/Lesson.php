<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Concerns\HasUuids,
    Factories\HasFactory,
    Model
};

class Lesson extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'course_id',
        'name'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
