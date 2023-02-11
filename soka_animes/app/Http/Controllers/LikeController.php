<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class LikeController extends Controller
{
    public function likePost(Request $request, int $postId){
        if(!$request->ajax()){
            return;
        }

        $post = Post::find($postId);
        $user = auth()->user();

        if ($post->isLikedBy($user)) {

            $like = PostLike::where('user_id', $user->id)->where('post_id', $post->id)->first();
            if($like){
                $like->delete();
            }

            return response()->json([
                'likeCount' => $post->likes()->count(),
                'liked' => false,
            ]);
        } else {

            $like = new PostLike();
            $like->user_id = $user->id;
            $like->post_id = $post->id;
            $like->save();

            return response()->json([
                'likeCount' => $post->likes()->count(),
                'liked' => true,
            ]);
        }
    }
}
