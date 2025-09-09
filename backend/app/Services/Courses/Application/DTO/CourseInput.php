<?php

namespace App\Services\Courses\Application\DTO;

class CourseInput
{
    public function __construct(
        public readonly int $page = 1
    ) {}
}
