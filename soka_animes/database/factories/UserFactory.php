<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('sokaanimes'),
            'profile_image' => 'default-' .rand(1, 5) . '.jpg',
            'profile_cover' => 'default-cover-' .rand(1, 5) . '.jpg',
            'remember_token' => $this->faker->unique()->randomNumber(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            if($user->type != 0){
                $user->posts()->saveMany(Post::factory(20)->make([
                    'user_id' => $user->id,
                ]));
            }
        });
    }
}

