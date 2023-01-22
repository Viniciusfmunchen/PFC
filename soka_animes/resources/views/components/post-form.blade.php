<div class="">
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Opa! Parece que algo deu errado</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <form action="{{route('post.store')}}" method="POST">
            <div class="card-header">
                <div class="row d-flex">
                    <div class="col-6">
                        {{Auth::user()->name}}
                    </div>
                    <div class="col-6 text-end">
                        <button class="btn btn-success mt-0" type="submit">Publicar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <input class="form-control" type="text" name="content" id="content">
                <input class="d-none" value="{{Auth::user()->id}}" name="user_id" id="user_id">
            </div>

            <button type="button" class="btn btn-primary dropdown-toggle m-3" data-bs-toggle="modal" data-bs-target="#modalWorks">
                Obras
            </button>
            <div class="modal fade" id="modalWorks" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Selecione as obras que se relacionam a seu post</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Animes:</h5>
                            @foreach($works->where('type', '0') as $work)
                                <input type="checkbox" class="btn-check" name="work[]" id="work{{$work->id}}" autocomplete="off" value="{{$work->id}}">
                                <label class="btn btn-outline-primary mx-1" for="work{{$work->id}}">{{$work->name}}</label>
                            @endforeach
                            <h5>Mangas:</h5>
                            @foreach($works->where('type', '1') as $work)
                                <input type="checkbox" class="btn-check" name="work[]" id="work{{$work->id}}" autocomplete="off" value="{{$work->id}}">
                                <label class="btn btn-outline-primary mx-1" for="work{{$work->id}}">{{$work->name}}</label>
                            @endforeach
                            <h5>Filmes:</h5>
                            @foreach($works->where('type', '2') as $work)
                                <input type="checkbox" class="btn-check" name="work[]" id="work{{$work->id}}" autocomplete="off" value="{{$work->id}}">
                                <label class="btn btn-outline-primary mx-1" for="work{{$work->id}}">{{$work->name}}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="modal" data-bs-target="#modalCharacters">
                Personagens
            </button>
            <div class="modal fade" id="modalCharacters" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Selecione os personagens que se relacionam a seu post</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Personagens:</h5>
                            @foreach($characters as $character)
                                <input type="checkbox" class="btn-check" name="character[]" id="character{{$character->id}}" autocomplete="off" value="{{$character->id}}">
                                <label class="btn btn-outline-primary mx-1" for="character{{$character->id}}">{{$character->name}}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
