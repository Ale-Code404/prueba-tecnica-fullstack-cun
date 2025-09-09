<?php

namespace App\Services\Lessons\Domain;

use Illuminate\Pagination\LengthAwarePaginator as PaginatedResult;

interface LessonRepository
{
    public function getLessons(string $courseId, int $page): PaginatedResult;
}
