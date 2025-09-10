<?php

namespace Tests\Feature\Courses;

use Tests\TestCase;

class GetCoursesTest extends TestCase
{
    public function test_can_get_courses(): void
    {
        $response = $this->getJson('/api/courses');

        $response->assertStatus(200)->assertJsonStructure(
            [
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'description',
                    ]
                ],
                'meta' => ['total']
            ]
        );
    }
}
