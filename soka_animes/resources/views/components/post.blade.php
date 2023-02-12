<div class="d-flex flex-row p-3 border-bottom border-info">
    <a href="{{route('profile.user', $user->name)}}"><img src="{{'/img/profile-images/' . $user->profile_image}}" width="40" height="40" class="rounded-circle mr-3"></a>
    <div class="w-100 ms-2">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-row align-items-center">
                <a class="text-decoration-none text-light" href="{{route('profile.user', $user->name)}}"><span class="mr-2"><b>{{$user->name}}</b></span></a>
                <small class="mx-2" >{{$post->created_at->diffForHumans()}}</small>
            </div>
            @if($post->user_id == Auth::user()->id)
                <div class="col-1 dropstart">
                    <a href="" class="text-decoration-none text-light" id="showMore" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></a>
                    <ul class="dropdown-menu bg-secondary">
                        <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$post->id}}"><i class="fa-solid fa-trash me-2"></i>Excluir</button></li>
                    </ul>
                </div>
            @endif
        </div>
        <p class="text-justify comment-text mb-0">{{$post->content}}</p>
        <div class="d-flex flex-row user-feed">
            <button class="btn-comment border border-dark me-3" data-bs-toggle="modal" data-bs-target="#modalComment{{$post->id}}" style="padding: 0px"><i class="fa-regular fa-comment me-1"></i>{{$post->comments()->count()}}</button>
            <button type="button" class="btn-like border border-dark me-3" data-post-id="{{$post->id}}" style="padding: 0px"><span class="@if (Auth::user()->postLikes->where('post_id', $post->id)->count() > 0) fa-solid @else fa-regular @endif fa-heart me-1" id="like-heart{{$post->id}}"></span ><span id="like-count{{$post->id}}">{{$post->likes()->count()}}</span></button>
            @if($post->works()->count() > 0 || $post->characters()->count() > 0)
                <button class="btn-comment border border-dark me-3" data-bs-toggle="modal" data-bs-target="#modalTags{{$post->id}}"><i class="fa-solid fa-tags me-2"></i>Tags</button>
            @endif
        </div>
    </div>
</div>
<div class="modal fade" id="modalComment{{$post->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-light pt-4 pe-4 ps-4 pb-3 rounded-4">
            <div class="modal-body" style="padding: 0px">
                <div class="row mb-3">
                    <div class="col-1">
                        <div class="little-profile">
                            <div class="pro-img-icon-no-line"><img src="{{'/img/profile-images/' . $user->profile_image}}" alt="user"></div>
                        </div>
                        <div class="d-flex border-end border-secondary mx-auto" style="height: calc(120% - 45px);width: 6px">
                        </div>
                    </div>
                    <div class="col-11">
                        <span class="fw-bold"> {{$user->name}} </span>- {{$post->created_at}}
                        <p>{{$post->content}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <div class="little-profile">
                            <div class="pro-img-icon-no-line"><img src="{{'/img/profile-images/' . $user->profile_image}}" alt="user"></div>
                        </div>
                    </div>
                    <div class="col-11">
                        <form action="{{route('comment.store')}}" method="POST">
                            @csrf
                            <textarea class="form-control input-dark" name="content" id="content" placeholder="Publique sua resposta"></textarea>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary rounded-pill" id="submitComment">Responder</button>
                            </div>
                            <input type="text" class="d-none" value="{{Auth::user()->id}}" name="user_id">
                            <input type="text" class="d-none" value="{{$post->id}}" name="post_id">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDelete{{$post->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content bg-dark text-light d-block rounded-3">
            <div class="modal-body">
                <h5 class="fw-bold">Excluir publicação?</h5>
                <p class="text-white-50">Essa ação não poderá ser desfeita, a publicação, com seus comentarios, será removida, do seu perfil, da timeline, de todas as contas que seguem você e dos resultados de busca.</p>
                <form action="{{route('posts.destroy', $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger form-control rounded-pill">Excluir</button>
                </form>
                <button type="button" class="btn btn-dark form-control rounded-pill border border-secondary mt-3" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTags{{$post->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light d-block rounded-3">
            <div class="modal-header border-secondary pb-2">
                <h5 style="margin: 0px"> <i class="fa-solid fa-tags me-1"></i>Tags</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 d-block border-end border-secondary">
                        <h4>Obras:</h4>
                        @foreach($works as $work)
                            <a href="" class="text-decoration-none text-light"><span class="badge bg-secondary">{{$work->name}}</span></a>
                        @endforeach
                    </div>
                    <div class="col-6 d-block">
                        <h4>Personagens:</h4>
                        @foreach($characters as $character)
                            <a href="{{route('characters.show', $character->id)}}" class="text-decoration-none text-light d-block"><span class="badge bg-secondary">{{$character->name}}</span></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


