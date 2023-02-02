<div class="border-bottom border-secondary px-3 pt-3 text-light">
        <div class="row">
            <div class="col-1">
                <div class="image-post bg-secondary rounded-circle d-flex justify-content-center align-items-center">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
            <div class="col-10">
                <span class="fw-bold"> {{$username}} </span>- {{$post->created_at}}
                <a href="" class="text-decoration-none text-light"><p class="mb-2">{{$post->content}}</p></a>
                <button class="btn-comment border border-dark me-3" data-bs-toggle="modal" data-bs-target="#modalComment{{$post->id}}" style="padding: 0px"><i class="fa-regular fa-comment me-1"></i>1.200</button>
                <a href="#" class="btn-like border border-dark" style="padding: 0px" data-bs-toggle="dropdown" role="button" aria-expanded="false" id="showMore">
                    <i class="fa-regular fa-heart rounded-circle me-1"></i>15.000
                </a>
            </div>
            <div class="col-1 dropstart">
                <a href="" class="text-decoration-none text-light" id="showMore" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></a>
                <ul class="dropdown-menu bg-dark">
                    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalTags{{$post->id}}"><i class="fa-solid fa-tags me-2"></i>Tags</button></li>
                    @if($post->user_id == Auth::user()->id)
                        <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$post->id}}"><i class="fa-solid fa-trash me-2"></i>Excluir</button></li>
                    @endif
                </ul>
            </div>
        </div>
</div>
<div class="modal fade" id="modalComment{{$post->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-light pt-4 pe-4 ps-4 pb-3 rounded-4">
            <div class="modal-body" style="padding: 0px">
                <div class="row mb-3">
                    <div class="col-1">
                        <div class="image-post bg-secondary rounded-circle d-flex justify-content-center align-items-center mx-auto">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="d-flex border-end border-secondary mx-auto" style="height: calc(120% - 45px);width: 6px">
                        </div>
                    </div>
                    <div class="col-11">
                        <span class="fw-bold"> {{$username}} </span>- {{$post->created_at}}
                        <p>{{$post->content}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <div class="image-post bg-secondary rounded-circle d-flex justify-content-center align-items-center mx-auto">
                            <i class="fa-solid fa-user"></i>
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
                <p class="text-secondary">Essa ação não poderá ser desfeita, a publicação, com seus comentarios, será removida, do seu perfil, da timeline, de todas as contas que seguem você e dos resultados de busca.</p>
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
                            <a href="" class="text-decoration-none text-light d-block"><span class="badge bg-secondary">{{$character->name}}</span></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

