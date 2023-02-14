<x-app title="{{$work->name}}">
    <div class="bg-dark border-bottom border-info position-sticky sticky-top p-3 mx-3">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">{{$work->name}} @if($work->type == 0)<span class="badge bg-white-50 border border-anime text-light fs-5">Animê</span>@else <span class="badge bg-white-50 border border-manga text-light fs-5">Mangá</span> @endif</h2>
            <div class="d-block fs-5">
                <i class="fa-regular fa-heart"></i>
                <span>12.000</span>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row  m-4 gap-3" style="max-height: 250px">
        <div>
            <img class="rounded-5" width="150" height="230" src="{{$work->image}}" alt="">
        </div>
        <div class="bg-secondary rounded-4 p-3" width="100%" height="230" style="overflow:auto">
            {{$work->synopsis}}
        </div>
    </div>
    <div class="bg-secondary p-3 m-4 rounded-3">
        @foreach($work->genders as $wgender)
            <span class="badge bg-white-50 border border-gender text-light">{{$wgender->gender}}</span>
        @endforeach
    </div>
    <div class="border-top border-info px-3 pb-3">
        <div class="row text-center">
            @if($work->type == 0)
                <div class="col-lg-4 col-md-4 m-t-20">
                    <h3 class="m-b-0">{{$work->chapters}}</h3><small>Episódio(s)</small>
                </div>
                <div class="col-lg-4 col-md-4 m-t-20">
                    <h3 class="m-b-0 ">{{$work->volumes}}</h3><small>Temporada(s)</small>
                </div>
            @else
                <div class="col-lg-4 col-md-4 m-t-20">
                    <h3 class="m-b-0">{{$work->chapters}}</h3><small>Capitulo(s)</small>
                </div>
                <div class="col-lg-4 col-md-4 m-t-20">
                    <h3 class="m-b-0 ">{{$work->volumes}}</h3><small>Volume(s)</small>
                </div>
            @endif
            <div class="col-lg-4 col-md-4 m-t-20">
                <h3 class="m-b-0">{{$work->release_date}}</h3><small>Lançamento</small>
            </div>
        </div>
        <div class="row text-center mt-3">
            @if($work->type == 0)
                <div class="col-lg-4 col-md-4 m-t-20 text">
                    <h3 class="m-b-0 text">{{$work->producer}}</h3><small>Produtora</small>
                </div>
                <div class="col-lg-4 col-md-4 m-t-20 text">
                    <h3 class="m-b-0 text">{{$work->author}}</h3><small>Autor</small>
                </div>
            @else
                <div class="col-lg-4 col-md-4 m-t-20 text">
                    <h3 class="m-b-0 text">{{$work->producer}}</h3><small>Editora</small>
                </div>
                <div class="col-lg-4 col-md-4 m-t-20 text">
                    <h3 class="m-b-0 text">{{$work->author}}</h3><small>Autor</small>
                </div>
            @endif
            <div class="col-lg-4 col-md-4 m-t-20 text">
                <h3 class="m-b-0 text">
                    @if($work->status == 0)
                        Em Andamento
                    @elseif($work->status == 1)
                        Em Hiato
                    @else
                        Finalizado
                    @endif
                </h3><small>Status</small>
            </div>
        </div>
    </div>
    <div class="border-top border-info">
        <div class="p-3">
            <h2>Personagens:</h2>
        </div>
        <div class="row row-cols-3 row-cols-md-3 g-4 p-3">
            @foreach ($work->characters as $character)
                <a href="{{route('characters.show', $character)}}" class="text-decoration-none text-light">
                    <div class="col card-group">
                        <div class="card bg-secondary position-static">
                            <img src="{{$character->image}}" class="card-img-top" alt="..." style="max-height: 200px">
                            <div class="card-body d-flex justify-content-center align-items-center text-center">
                                <h6 class="card-title fw-bold">{{$character->name}}</h6>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    @if(Auth::user()->isAdmin())
        <div class="bg-secondary p-3 rounded-bottom">
            <a href="{{route('works.edit', $work->id)}}" class="btn btn-primary">Editar Informações</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$work->id}}"></i>Excluir Obra<i class="fa-solid fa-trash"></i></button>
        </div>
    @endif
    <div class="modal fade" id="modalDelete{{$work->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content bg-dark text-light d-block rounded-3">
                <div class="modal-body">
                    <h5 class="fw-bold">Excluir Obra?</h5>
                    <p class="text-white-50">Essa ação não poderá ser desfeita, a obra, e tudo relacionado a ela, sera excluido de nossos registros para sempre.</p>
                    <form action="{{route('works.destroy', $work->id)}}" method="post">
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

