<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostLikeFactory extends Factory
{
    public function definition()
    {

        return [
            "user_id" => 2,
            "post_id" => 1,
        ];
    }
}
