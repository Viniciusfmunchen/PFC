<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Post;
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
        $works = Work::all();
        $characters = Character::all();
        $posts = Post::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->with('characters', 'works')->get();
        return view('home', compact('works', 'characters', 'posts'));
    }
}
