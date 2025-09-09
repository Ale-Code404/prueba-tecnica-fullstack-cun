<?php

namespace App\Services\Lessons\Application;

use App\Services\Lessons\Application\DTO\LessonInput;
use App\Services\Lessons\Domain\LessonRepository;

class GetLessons
{
    public function __construct(
        private readonly LessonRepository $lessonRepository
    ) {}

    public function __invoke(LessonInput $input)
    {
        return $this->lessonRepository->getLessons(
            $input->courseId,
            $input->page
        );
    }
}
