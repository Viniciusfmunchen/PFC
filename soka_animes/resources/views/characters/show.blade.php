<x-app title="{{$character->name}}">
    <div class="border-bottom border-info position-sticky sticky-top p-3 mx-3">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">{{$character->name}}</h2>
            @auth
                @if(!Auth::user()->isAdmin())
                    <div class="fs-5">
                        <button type="button" class="btn-like btn-like-character border-none me-1" data-character-id="{{$character->id}}" style="padding: 0px"><span class="@if (Auth::user()->characterLikes->where('work_id', $character->id)->count() > 0) fa-solid @else fa-regular @endif fa-heart me-1" id="like-heart{{$character->id}}"></span ></button>
                        <span id="like-count{{$character->id}}" class="text-white-50">{{$character->likes()->count()}}</span>
                    </div>
                @endif
            @endauth
        </div>
    </div>
    <div class="d-flex flex-row  m-4 gap-3" style="max-height: 250px">
        <div>
            <img class="rounded-5" width="150" height="230" src="{{$character->image}}" alt="">
        </div>
        <div class="bg-secondary rounded-4 p-3" width="100%" height="230" style="overflow:auto">
            {{$character->description}}
        </div>
    </div>
    <div class="border-top border-info">
        <div class="p-2 border-bottom border-info">
            <h2>Obras:</h2>
        </div>
            <div class="row row-cols-1 row-cols-md-3 g-3 p-3">
                @foreach ($character->works as $work)
                    <div class="col card-group">
                        <div class="card bg-secondary position-static" data-work-type="{{$work->type}}">
                            <a href="{{route('works.show', $work->id)}}"><img src="{{$work->image}}" class="card-img-top" alt="..." style="max-height: 200px"></a>
                            <div class="card-body d-flex justify-content-center align-items-center text-center">
                                <h6 class="text-fluid fw-bold">{{$work->name}}</h6>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <span class="badge text-dark  @if($work->type == 0) bg-anime @else bg-manga @endif"><b>@if($work->type == 0) ANIMÊ @else MANGÁ @endif</b></span>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
    </div>
    @auth
        @if(Auth::user()->isAdmin())
            <div class="bg-secondary p-3 rounded-bottom">
                <a href="{{route('characters.edit', $character->id)}}" class="btn btn-primary">Editar Informações</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$character->id}}"></i>Excluir Personagem<i class="fa-solid fa-trash"></i></button>
            </div>
        @endif
    @endauth
    <div class="modal fade" id="modalDelete{{$character->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content bg-dark text-light d-block rounded-3">
                <div class="modal-body">
                    <h5 class="fw-bold">Excluir Personagem?</h5>
                    <p class="text-white-50">Essa ação não poderá ser desfeita, e o personagem sera excluido permanentemente de nossos registros.</p>
                    <form action="{{route('characters.destroy', $character->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger form-control rounded-pill">Excluir</button>
                    </form>
                    <button type="button" class="btn btn-dark form-control rounded-pill border border-secondary mt-3" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</x-app>
