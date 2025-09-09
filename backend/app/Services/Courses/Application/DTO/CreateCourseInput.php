<?php

namespace App\Services\Courses\Application\DTO;

class CreateCourseInput
{
    public function __construct(
        public string $id,
        public string $name,
        public ?string $description = null,
    ) {}
}
