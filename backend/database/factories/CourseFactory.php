<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\{
    Course,
    Lesson,
    Question
};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3, true),
            'description' => Str::take($this->faker->paragraphs(3, true), 200),
        ];
    }

    public function withLessons(
        int $lessons = 3
    ): self {
        return $this->afterCreating(function (Course $course) use ($lessons) {
            $lessons = Lesson::factory()
                ->count($lessons)
                ->create(['course_id' => $course->id]);

            $course->lessons()->saveMany($lessons);
        });
    }

    public function withQuestionPerLesson(
        int $questions = 3
    ): self {
        return $this->afterCreating(function (Course $course) use ($questions) {
            foreach ($course->lessons as $lesson) {
                $lesson->questions()->saveMany(
                    Question::factory()
                        ->count($questions)
                        ->withOptions(3)
                        ->create(['lesson_id' => $lesson->id])
                );
            }
        });
    }
}
