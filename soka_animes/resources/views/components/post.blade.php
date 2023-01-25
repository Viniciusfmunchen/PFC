<div class="mt-3">
    <div class="card">

        <div class="card-body">
            <h6 class="fw-bold"> {{$username}} - {{$post->created_at}}</h6><br>
            {{$post->content}}
        </div>
        <div class="card-footer">
                <div>
                    @foreach($works as $work)
                        <span class="badge rounded-pill bg-warning mx-1">{{ $work->name }}</span>
                    @endforeach
                    @foreach($characters as $character)
                        <a class="badge rounded-pill bg-info mx-1 text-decoration-none" href="{{route('characters.show', $character->id)}}"> {{ $character->name }} </a>
                    @endforeach
                </div>
        </div>
    </div>
    <div class="row d-flex">
        <div class="col-6">
            <button class="btn text-primary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#commentForm{{$post->id}}" aria-expanded="false"
                    aria-controls="commentForm{{$post->id}}">
                Comentar
            </button>
        </div>
        <div class="col-6 text-end">
            <button class="btn text-primary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#comments" aria-expanded="false"
                    aria-controls="comments">
                Ver Comentarios
            </button>
        </div>
    </div>
    <form action="{{route('comment.store')}}" method="POST" class="collapse" id="commentForm{{$post->id}}">
        @csrf
        <label for="content">Comentario</label>
        <div class="form-row d-flex">
            <input class="form-control" type="text" name="content" id="content">
            <input class="d-none" value="{{Auth::user()->id}}" name="user_id" id="user_id">
            <input class="d-none" value="{{$post->id}}" name="post_id" id="user_id">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>

    <div class="collapse" id="comments">
        test
    </div>
</div>
