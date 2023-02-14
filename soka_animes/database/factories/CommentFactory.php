<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => '',
            'post_id' => '',
            'content' => fake()->text(rand(100, 500)),
        ];
    }

}
