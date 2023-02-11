<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@sokaanimes.com',
            'type' => '0',
            'password' => Hash::make('adminsokaanimes')
        ]);

        $users = \App\Models\User::factory(20)->create();
        foreach ($users as $user){
            $posts = \App\Models\Post::factory(10)->create([
                "user_id" => $user->id,
            ]);

            foreach ($posts as $post){
                $comments = \App\Models\Comment::factory(rand(5, 10))->create([
                    'user_id' => rand(2, $users->count()),
                    'post_id' => $post->id,
                ]);

                $likes = \App\Models\PostLike::factory(rand(1, 10))->create([
                   'user_id' => rand(2, $users->count()),
                   'post_id' => $post->id,
                ]);
            }
        }


    }
}

