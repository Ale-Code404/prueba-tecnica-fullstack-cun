<?php

namespace App\Services\Courses\Application\DTO;

class CourseInput
{
    public function __construct(
        public int $page = 1
    ) {}
}
