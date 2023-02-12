<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => 1,
            'content' => fake()->text(1000),
            'created_at' => fake()->dateTimeBetween('-20 days', now()),
        ];
    }

}
