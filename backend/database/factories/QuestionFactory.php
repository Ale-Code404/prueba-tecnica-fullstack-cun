<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sentence' => sprintf("¿%s?", $this->faker->sentences($this->faker->numberBetween(3, 5), true))
        ];
    }

    public function withOptions(int $options = 4): self
    {
        return $this->state(function (array $attributes) use ($options) {
            $opts = collect(range(1, $options))->map(function () {
                return [
                    'uuid' => $this->faker->uuid(),
                    'answer' => $this->faker->sentence(3, true)
                ];
            });

            return [
                'options' => $opts->toArray(),
                'correct_option' => $opts->random()['uuid']
            ];
        });
    }
}
