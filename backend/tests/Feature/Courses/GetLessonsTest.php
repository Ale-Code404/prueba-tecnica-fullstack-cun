<?php

namespace Tests\Feature\Courses;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetLessonsTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_lessons_by_course(): void
    {
        $course = Course::factory()
            ->withLessons(1)
            ->create();

        $response = $this->getJson(
            sprintf('/api/courses/%s/lessons', $course->id)
        );

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => [
                '*' => [
                    'id',
                    'course' => [
                        'id',
                        'name'
                    ],
                    'name',
                ]
            ]]);
    }
}
