<?php

namespace App\Repositories\Courses;

use App\Models\Course as CourseModel;
use App\Services\Courses\Domain\CourseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentCourseRepository implements CourseRepository
{
    public function getCourses(int $page): LengthAwarePaginator
    {
        return CourseModel::query()
            ->paginate(
                config('app.pagination'),
                ['*'],
                'page',
                $page
            );
    }

    public function createCourse(string $id, string $name, ?string $description): CourseModel
    {
        return CourseModel::create([
            'id' => $id,
            'name' => $name,
            'description' => $description,
        ]);
    }
}
