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
        return [
            'user_id' => 1,
            'content' => fake()->text(rand(100, 500)),
            'created_at' => fake()->dateTimeBetween('-20 days', now()),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $works = Work::inRandomOrder()->limit(5)->get();
            $characters = Character::inRandomOrder()->limit(5)->get();

            $post->works()->attach($works);
            $post->characters()->attach($characters);

            $otherUsers = User::where('id', '!=', $post->user_id)->inRandomOrder()->limit(20)->get();

            $comments = Comment::factory(rand(0, 100))->make([
                'post_id' => $post->id,
            ]);

            foreach ($comments as $comment) {
                $comment->user_id = $otherUsers->random()->id;
            }

            $likes = PostLike::factory(rand(0, 500))->make([
                'user_id' => $otherUsers->random()->id,
                'post_id' => $post->id,
            ]);

            $post->comments()->saveMany($comments);
            $post->likes()->saveMany($likes);
        });
    }

}
