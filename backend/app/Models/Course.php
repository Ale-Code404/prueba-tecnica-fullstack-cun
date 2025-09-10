<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Concerns\HasUuids,
    Factories\HasFactory,
    Model
};

class Course extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'description',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
