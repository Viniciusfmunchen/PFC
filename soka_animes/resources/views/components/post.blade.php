<div class="mt-3">
    <div class="card">
        <div class="card-header">
            {{$username}}
        </div>
        <div class="card-body">
            {{$content}}
        </div>
        <div class="card-footer bg-secondary">
                <div>
                @foreach($works as $work)
                    <span class="badge rounded-pill bg-warning mx-1">{{ $work->name }}</span>
                @endforeach
                @foreach($characters as $character)
                    <a class="badge badge-pill bg-info mx-1 text-decoration-none" href="{{route('characters.show', $character->id)}}"> {{ $character->name }} </a>
                    @endforeach
                </div>
        </div>
    </div>
</div>
