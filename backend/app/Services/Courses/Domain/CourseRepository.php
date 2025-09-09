<?php

namespace App\Services\Courses\Domain;

use App\Models\Course;
use Illuminate\Contracts\Pagination\LengthAwarePaginator as PaginatedResult;

interface CourseRepository
{
    public function getCourses(int $page): PaginatedResult;

    public function createCourse(
        string $id,
        string $name,
        ?string $description
    ): Course;
}
