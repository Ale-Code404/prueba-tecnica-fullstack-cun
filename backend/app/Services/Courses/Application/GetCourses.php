<?php

namespace App\Services\Courses\Application;

use App\Services\Courses\Application\DTO\CourseInput;
use App\Services\Courses\Domain\CourseRepository;

class GetCourses
{
    public function __construct(private CourseRepository $courseRepository) {}

    public function __invoke(CourseInput $input)
    {
        return $this->courseRepository->getCourses(
            $input->page
        );
    }
}
