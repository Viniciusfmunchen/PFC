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
        $followingIds = Auth::user()->followings()->pluck('id');

        $posts = Post::whereIn('user_id', $followingIds)
            ->withCount('likes')
            ->orderByDesc('created_at')
            ->orderByDesc('likes_count')
            ->take(10)
            ->get();

        $postsWithMostFollowers = User::withCount('followers')
            ->orderByDesc('followers_count')
            ->take(10)
            ->get()
            ->map(function ($user) {
                return $user->posts()->orderByDesc('created_at')->get();
            })
            ->flatten();

        $posts = $posts->concat($postsWithMostFollowers)
            ->sortByDesc('created_at');

        return view('home.home', compact('posts'));
    }
}
