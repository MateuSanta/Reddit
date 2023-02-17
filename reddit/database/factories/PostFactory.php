<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->text(10),
            'body' => fake()->text(),
            'user_id'=>random_int(1,2),
            'community_id'=>random_int(1,1)
        ];
    }

}
