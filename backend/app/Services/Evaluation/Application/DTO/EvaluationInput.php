<?php

namespace App\Services\Evaluation\Application\DTO;

class EvaluationInput
{
    public function __construct(
        public readonly string $questionId,
        public readonly string $answerId
    ) {}
}
