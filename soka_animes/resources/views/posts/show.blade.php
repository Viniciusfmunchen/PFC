<x-app title="Publicação de {{$post->user->name}}" >
    <x-post :user="$post->user" :post="$post" :works="$post->works" :characters="$post->characters" :comments="$post->comments"></x-post>
    @foreach($postComments as $comment)
        <div class="d-flex flex-row p-3 border-bottom border-dark bg-secondary">
            <a href="{{route('profile.user', $comment->user->name)}}"><img src="{{'/img/profile-images/' . $comment->user->profile_image}}" width="40" height="40" class="rounded-circle mr-3"></a>
            <div class="w-100 ms-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-row align-items-center">
                        <a class="text-decoration-none text-light" href="{{route('profile.user', $comment->user->name)}}"><span class="mr-2"><b>{{$comment->user->name}}</b></span></a>
                        <small class="mx-2" >{{$comment->created_at->diffForHumans()}}</small>
                    </div>
                    @if($comment->user_id == Auth::user()->id or Auth::user()->isAdmin())
                        <div class="col-1 dropstart">
                            <a href="" class="text-decoration-none text-light" id="showMore" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></a>
                            <ul class="dropdown-menu bg-secondary">
                                <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$comment->id}}"><i class="fa-solid fa-trash me-2"></i>Excluir</button></li>
                            </ul>
                        </div>
                    @endif
                </div>
                <p class="text-justify comment-text mb-0">{{$comment->content}}</p>
                <div class="d-flex flex-row user-feed">
                    <button type="button" class="btn-like btn-like-comment border-none me-3" data-comment-id="{{$comment->id}}" style="padding: 0px"><span class="@if (Auth::user()->commentLikes->where('comment_id', $comment->id)->count() > 0) fa-solid @else fa-regular @endif fa-heart me-1" id="like-heart{{$comment->id}}"></span ><span id="like-count{{$comment->id}}">{{$comment->likes()->count()}}</span></button>
                    @if($post->works()->count() > 0 || $post->characters()->count() > 0)
                        <button class="btn-comment border border-dark me-3" data-bs-toggle="modal" data-bs-target="#modalTags{{$post->id}}"><i class="fa-solid fa-tags me-2"></i>Tags</button>
                    @endif
                </div>

            </div>
        </div>
    @endforeach
</x-app>

