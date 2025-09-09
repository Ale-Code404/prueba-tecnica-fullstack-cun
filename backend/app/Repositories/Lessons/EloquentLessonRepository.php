<?php

namespace App\Repositories\Lessons;

use App\Models\Lesson;
use App\Services\Lessons\Domain\LessonRepository;
use Illuminate\Pagination\LengthAwarePaginator as PaginationLengthAwarePaginator;

class EloquentLessonRepository implements LessonRepository
{
    public function getLessons(string $courseId, int $page): PaginationLengthAwarePaginator
    {
        return Lesson::query()
            ->with('course')
            ->where('course_id', $courseId)
            ->paginate(
                config('app.pagination'),
                ['*'],
                'page',
                $page
            );
    }
}
