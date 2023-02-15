<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostLike;
use App\Models\User;
use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'content' => fake()->text(rand(100, 500)),
            'created_at' => fake()->dateTimeBetween('-20 days', now()),
        ];
    }

}
