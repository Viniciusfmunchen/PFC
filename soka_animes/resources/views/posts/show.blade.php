<x-app title="">
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
            </div>
        </div>
    @endforeach
</x-app>

