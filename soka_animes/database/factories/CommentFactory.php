<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    public function definition()
    {
        $post = Post::inRandomOrder()->first();
        $user = User::where('id', '!=', $post->user_id)->inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => fake()->text(rand(100, 500)),
        ];
    }

}
