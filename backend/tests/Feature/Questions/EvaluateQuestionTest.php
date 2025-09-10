<?php

namespace Tests\Feature\Questions;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EvaluateQuestionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_successfully_evaluate_questions(): void
    {
        $course = Course::factory()
            ->withLessons(1)
            ->withQuestionPerLesson(3)
            ->create();

        $lesson = $course->lessons->first();
        $question = $lesson->questions->first();

        $response = $this->postJson('/api/evaluations', [
            'question' => $question->id,
            'answer' => $question->correct_option,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'is_correct' => true,
                ]
            ]);
    }
}
