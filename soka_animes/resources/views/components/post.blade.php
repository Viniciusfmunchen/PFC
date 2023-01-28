<div class="mt-3">
    <a href="{{route('posts.show', $post->id)}}" class="text-decoration-none text-dark">
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
                        <a class="badge rounded-pill bg-info mx-1 text-decoration-none"
                           href="{{route('characters.show', $character->id)}}"> {{ $character->name }} </a>
                    @endforeach
                </div>
            </div>
        </div>
    </a>

    <button class="text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#formComment{{$post->id}}" aria-expanded="false" aria-controls="formComment{{$post->id}}">
            Comentar
    </button>
    <form action="{{route('comment.store')}}" method="POST" class="collapse" id="formComment{{$post->id}}">
        @csrf
        <label for="content"></label>
        <input class="form-control" type="text" name="content" id="content">
        <input type="text" class="d-none" name="user_id" value="{{Auth::user()->id}}">
        <input type="text" class="d-none" name="post_id" value="{{$post->id}}">
        <button type="submit" class="btn btn-outline-success">Comentar</button>
    </form>
</div>
