<?php

namespace App\Services\Questions\Application;

use App\Services\Questions\Application\DTO\QuestionInput;
use App\Services\Questions\Domain\QuestionRepository;

class GetQuestions
{
    public function __construct(
        private readonly QuestionRepository $questionRepository
    ) {}

    public function __invoke(QuestionInput $input)
    {
        return $this->questionRepository->getQuestions(
            $input->lessonId
        );
    }
}
