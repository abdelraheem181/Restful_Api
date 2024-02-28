<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lesson;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>$this->faker->numberBetween(1, 50),
           // 'user_id' =>$this->faker->numberBetween(1,50),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
    }
}
