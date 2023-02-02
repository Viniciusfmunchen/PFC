<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

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

        return redirect()->route('home')->with('success', 'Sua publicação foi enviada');
    }

    public function show(int $id){
        $post = Post::find($id);
        $postComments = $post->comments()->with('user')->get();
        return view('posts.show', compact('post', 'postComments'));
    }

    public function destroy(Post $post)
    {
        $post->works()->detach();
        $post->characters()->detach();
        $post->comments()->delete();
        $post->delete();

        return redirect()->back()->with('success', 'Publicação excluída.');
    }

}
