<?php

namespace App\Services\Questions\Application;

use App\Models\Question;
use App\Services\Questions\Application\Errors\QuestionNotFound;
use App\Services\Questions\Domain\QuestionRepository;

class GetQuestion
{
    public function __construct(private QuestionRepository $questionRepository) {}

    public function __invoke(string $questionId): Question
    {
        $question = $this->questionRepository->findById($questionId);

        if (!$question) {
            throw new QuestionNotFound($questionId);
        }

        return $question;
    }
}
