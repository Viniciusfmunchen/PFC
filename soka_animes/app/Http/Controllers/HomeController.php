<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Post;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user(); // pega o usuário logado

        $following = $user->followings->pluck('id'); // pega os ids dos usuários que o usuário logado está seguindo
        $notFollowed = User::whereNotIn('id', $following)->pluck('id'); // pega os ids dos usuários não seguidos pelo usuário logado

        $followings = Post::whereIn('user_id', $following)->get();

        // Busca os 10 posts com mais likes de usuários não seguidos pelo usuário logado
        $mostLiked = Post::whereIn('user_id', $notFollowed->concat($following))
            ->where('user_id', '!=', $user->id)
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->take(10)
            ->get();

        // Busca os 10 usuários com mais seguidores e não seguidos pelo usuário logado
        $mostFollowed = User::whereIn('id', $notFollowed)
            ->withCount('followers')
            ->orderBy('followers_count', 'desc')
            ->take(10)
            ->get();

        $mostFollowedPosts = collect();
        foreach ($mostFollowed as $followedUser) {
            $posts = $followedUser->posts()
                ->where('user_id', '!=', $user->id)
                ->take(10)
                ->get();
            $mostFollowedPosts = $mostFollowedPosts->concat($posts);
        }

        $posts = $mostLiked->concat($mostFollowedPosts)->concat($followings)->sortByDesc('created_at')->unique('id');

        return view('home.home', compact('posts'));
    }
}
