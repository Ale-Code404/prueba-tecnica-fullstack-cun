<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\Questions\Application\Errors\QuestionNotFound;
use Dedoc\Scramble\Attributes\BodyParameter;
use Exception;
use Illuminate\Http\Request;

use App\Services\Evaluation\Application\{
    DTO\EvaluationInput,
    EvaluateAnswer
};

class EvaluationController extends Controller
{
    /**
     * Evaluates a given answer for a question.
     * 
     */
    #[BodyParameter(name: 'question', description: 'The UUID of the question to evaluate.', required: true, example: '01993022-e030-7257-b4f0-10b83e0235e6s')]
    #[BodyParameter(name: 'answer', description: 'The UUID of the answer to evaluate.', required: true, example: '01993022-e030-7257-b4f0-10b83e0235e6a')]
    public function evaluate(Request $request, EvaluateAnswer $evaluateAnswer)
    {
        $request->validate([
            'question' => 'required|string|uuid',
            'answer' => 'required|string|uuid',
        ]);

        try {
            $isCorrect = $evaluateAnswer(
                new EvaluationInput(
                    questionId: $request->get('question'),
                    answerId: $request->get('answer')
                )
            );
        } catch (QuestionNotFound $e) {
            abort(404, $e->getMessage());
        } catch (Exception $e) {
            abort(500, 'An unexpected error occurred while evaluating the answer.');
        }

        return response()->json([
            'data' => [
                'is_correct' => $isCorrect
            ]
        ]);
    }
}
