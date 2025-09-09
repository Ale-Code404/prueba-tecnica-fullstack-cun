<?php

namespace App\Services\Evaluation\Application;

use App\Services\Evaluation\Application\DTO\EvaluationInput;
use App\Services\Questions\Application\GetQuestion;
use App\Services\Questions\Domain\QuestionRepository;

class EvaluateAnswer
{
    public function __construct(
        private QuestionRepository $questionRepository,
        private GetQuestion $getQuestion
    ) {}

    public function __invoke(EvaluationInput $input): bool
    {
        return $this->getQuestion->__invoke($input->questionId)
            ->isCorrect($input->answerId);
    }
}
