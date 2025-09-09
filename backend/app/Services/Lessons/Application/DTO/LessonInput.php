<?php

namespace App\Services\Lessons\Application\DTO;

class LessonInput
{
    public function __construct(
        public readonly string $courseId,
        public readonly int $page = 1
    ) {}
}
