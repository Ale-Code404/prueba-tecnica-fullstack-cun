<?php

namespace App\Repositories\Courses;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class CachedEloquentCourseRepository extends EloquentCourseRepository
{
    public function getCourses(int $page): LengthAwarePaginator
    {
        return Cache::remember(
            sprintf('courses.page.%d', $page),
            60,
            function () use ($page) {
                return parent::getCourses($page);
            }
        );
    }
}
