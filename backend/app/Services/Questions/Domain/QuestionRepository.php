<?php

namespace App\Services\Questions\Domain;

use App\Models\Question;
use Illuminate\Support\Collection;

interface QuestionRepository
{
    public function getQuestions(string $lessonId): Collection;

    public function findById(string $questionId): ?Question;
}
