<?php

namespace App\Services\Questions\Application\Errors;

use App\Services\Shared\Application\Errors\AppException;

class QuestionNotFound extends AppException
{
    public function __construct(string $questionId)
    {
        parent::__construct("Question with ID [{$questionId}] not found.");
    }
}
