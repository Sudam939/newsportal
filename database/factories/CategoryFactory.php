<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Category::create([
                'title' => fake()->unique()->name(),
                'nep_title' => fake()->unique()->word(),
                'slug' => fake()->unique()->slug()
            ])
        ];
    }
}
