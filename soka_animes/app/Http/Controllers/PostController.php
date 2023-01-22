<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Post;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'content' => 'required | max: 255',
            'user_id' => 'required'
        ]);

        $post = Post::create($request->post());
        $works = $request->work;
        $characters = $request->character;

        if(isset($works)){
            foreach ($works as $work) {
                $post->works()->attach($work);
            }
        }

        if(isset($characters)){
            foreach ($characters as $character) {
                $post->characters()->attach($character);
            }
        }

        return redirect()->route('home')->with('success', 'Sua publicacao foi .....');
    }

}
