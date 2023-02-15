<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Character;
use App\Models\CharacterLike;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Post;
use App\Models\PostLike;
use App\Models\User;
use App\Models\Work;
use App\Models\WorkLike;
use Database\Factories\PostFactory;
use Database\Factories\UserFactory;
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

         $this->call(WorkSeeder::class);
         $this->call(CharacterSeeder::class);

        $users = User::factory(50)->create();
        $posts = Post::factory(200)->create();
        $comments = Comment::factory(200)->create();
        foreach($users as $user){
            for($i = 0; $i < rand(1, $users->count()); $i++){
                $randomUser = User::where('id', '!=', $user->id)
                    ->where('type', '!=', '0')
                    ->whereNotIn('id', $user->followings()->pluck('id'))
                    ->inRandomOrder()
                    ->first();
                $user->followings()->attach($randomUser);
            }
        }
        foreach($posts as $post){
            for($i = 0; $i < rand(1, $posts->count()); $i++){
                $userId = $post->user_id;
                $randomUser = User::where('type', '!=', 0)
                    ->whereNotIn('id', function($query) use ($userId, $post) {
                        $query->select('user_id')
                            ->from('post_likes')
                            ->where('user_id', '!=', $userId)
                            ->where('post_id', $post->id);
                    })
                    ->inRandomOrder()
                    ->first();

                $like = new PostLike();
                $like->user_id = $randomUser->id;
                $like->post_id = $post->id;
                $like->save();
            }
        }
        foreach($comments as $comment){
            for($i = 0; $i < rand(1, $comments->count()); $i++){
                $userId = $comment->user_id;
                $randomUser = User::where('type', '!=', 0)
                    ->whereNotIn('id', function($query) use ($userId, $comment) {
                        $query->select('user_id')
                            ->from('comment_likes')
                            ->where('user_id', '!=', $userId)
                            ->where('comment_id', $comment->id);
                    })
                    ->inRandomOrder()
                    ->first();

                $like = new CommentLike();
                $like->user_id = $randomUser->id;
                $like->comment_id = $comment->id;
                $like->save();
            }
        }
        $works = Work::all();
        foreach($works as $work){
            for($i = 0; $i < rand(1, $works->count()); $i++){
                $randomUser = User::where('type', '!=', 0)
                    ->whereNotIn('id', function($query) use ($work) {
                        $query->select('user_id')
                            ->from('work_likes')
                            ->where('work_id', $work->id);
                    })
                    ->inRandomOrder()
                    ->first();

                $like = new WorkLike();
                $like->user_id = $randomUser->id;
                $like->work_id = $work->id;
                $like->save();
            }
        }
        $characters = Character::all();
        foreach($characters as $character){
            for($i = 0; $i < rand(1, $characters->count()); $i++){
                $randomUser = User::where('type', '!=', 0)
                    ->whereNotIn('id', function($query) use ($character) {
                        $query->select('user_id')
                            ->from('character_likes')
                            ->where('character_id', $character->id);
                    })
                    ->inRandomOrder()
                    ->first();

                $like = new CharacterLike();
                $like->user_id = $randomUser->id;
                $like->character_id = $character->id;
                $like->save();
            }
        }

    }
}

