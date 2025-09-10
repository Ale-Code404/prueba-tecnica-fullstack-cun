<?php

namespace Tests\Feature\Questions;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetQuestionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_questions_by_lesson(): void
    {
        $course = Course::factory()
            ->withLessons(1)
            ->create();

        $response = $this->getJson(
            sprintf('/api/lessons/%s/questions', $course->lessons->first()->id)
        );

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => [
                '*' => [
                    'id',
                    'sentence',
                    'options' => [
                        '*' => [
                            'uuid',
                            'answer'
                        ]
                    ]
                ]
            ]]);
    }
}
