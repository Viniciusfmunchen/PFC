<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\CharacterLike;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Post;
use App\Models\PostLike;
use App\Models\Work;
use App\Models\WorkLike;
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


    public function likeComment(Request $request, int $commentId){
        if(!$request->ajax()){
            return;
        }

        $comment = Comment::find($commentId);
        $user = auth()->user();

        if ($comment->isLikedBy($user)) {

            $like = CommentLike::where('user_id', $user->id)->where('comment_id', $comment->id)->first();
            if($like){
                $like->delete();
            }

            return response()->json([
                'likeCount' => $comment->likes()->count(),
                'liked' => false,
            ]);
        } else {

            $like = new CommentLike();
            $like->user_id = $user->id;
            $like->comment_id = $comment->id;
            $like->save();

            return response()->json([
                'likeCount' => $comment->likes()->count(),
                'liked' => true,
            ]);
        }
    }

    public function likeWork(Request $request, int $workId){
        if(!$request->ajax()){
            return;
        }

        $work = Work::find($workId);
        $user = auth()->user();

        if ($work->isLikedBy($user)) {

            $like = WorkLike::where('user_id', $user->id)->where('work_id', $work->id)->first();
            if($like){
                $like->delete();
            }

            return response()->json([
                'likeCount' => $work->likes()->count(),
                'liked' => false,
            ]);
        } else {

            $like = new WorkLike();
            $like->user_id = $user->id;
            $like->work_id = $work->id;
            $like->save();

            return response()->json([
                'likeCount' => $work->likes()->count(),
                'liked' => true,
            ]);
        }
    }
    public function likeCharacter(Request $request, int $characterId){
        if(!$request->ajax()){
            return;
        }

        $character = Character::find($characterId);
        $user = auth()->user();

        if ($character->isLikedBy($user)) {

            $like = CharacterLike::where('user_id', $user->id)->where('character_id', $character->id)->first();
            if($like){
                $like->delete();
            }

            return response()->json([
                'likeCount' => $character->likes()->count(),
                'liked' => false,
            ]);
        } else {

            $like = new CharacterLike();
            $like->user_id = $user->id;
            $like->character_id = $character->id;
            $like->save();

            return response()->json([
                'likeCount' => $character->likes()->count(),
                'liked' => true,
            ]);
        }
    }
}
