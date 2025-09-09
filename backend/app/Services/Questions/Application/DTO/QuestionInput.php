<?php

namespace App\Services\Questions\Application\DTO;

class QuestionInput
{
    public function __construct(
        public readonly string $lessonId,
    ) {}
}
