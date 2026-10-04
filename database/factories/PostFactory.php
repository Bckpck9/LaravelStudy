<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            "title" => fake()->word(),
            "image" =>fake()->randomElement([
                "image 1",
                "image 2",
                "image 3",
                "image 4",
                "image 5",
                "image 6",
                "image 7",
                "image 8",  
            ]),
            "likes" => fake()->numberBetween(1, 100),
            "is_published" => fake()->randomElement(['true','false']),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
