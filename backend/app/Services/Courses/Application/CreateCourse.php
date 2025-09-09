<?php

namespace App\Services\Courses\Application;

use App\Services\Courses\Application\DTO\CreateCourseInput;
use App\Services\Courses\Domain\CourseRepository;

class CreateCourse
{
    public function __construct(private CourseRepository $repository) {}

    public function __invoke(CreateCourseInput $input): void
    {
        $this->repository->createCourse(
            $input->id,
            $input->name,
            $input->description,
        );
    }
}
