<div class="mt-3">
    <div class="card">
        <a class="text-decoration-none text-dark" href="{{route('posts.show', 1)}}" >
            <div class="card-body">
                <h6 class="fw-bold"> {{$username}} - {{$post->created_at}}</h6><br>
                {{$post->content}}
            </div>
        </a>
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
</div>
