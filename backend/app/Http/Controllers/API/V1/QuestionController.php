<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Question\QuestionResource;

use App\Services\Questions\Application\{
    DTO\QuestionInput,
    GetQuestions
};

class QuestionController extends Controller
{
    /**
     * Get a paginated list of questions.
     * 
     * @param string $lessonId The uuid of the lesson.
     */
    public function index(string $lessonId, GetQuestions $getQuestions)
    {
        return QuestionResource::collection(
            $getQuestions(new QuestionInput(
                $lessonId
            ))
        );
    }
}
