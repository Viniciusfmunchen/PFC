<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Post;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = auth()->user();
        $works = Work::all();
        $characters = Character::all();
        $posts = Post::orderBy('created_at', 'DESC')->where('user_id', $user->id)->with('characters', 'works')->get();

        return view('profile.profile', compact('works', 'characters', 'posts', 'user'));
    }

    public function show($username){
        $user = User::all()->where('name', $username)->first();
        if (!$user->isAdmin()){
            $works = Work::all();
            $characters = Character::all();
            $posts = Post::where('user_id', $user->id)->with('characters', 'works')->get();
            $posts = $posts->sortByDesc('created_at');

            return view('profile.profile', compact('works', 'characters', 'posts', 'user'));
        }else{
            return back();
        }

    }
}
