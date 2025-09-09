<?php

namespace App\Services\Questions\Domain;

use Illuminate\Support\Collection;

interface QuestionRepository
{
    public function getQuestions(string $lessonId): Collection;
}
