<x-app title="Adicionar Personagem">
    <div class="container">
        <form action="{{ route('characters.update', $character->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome:</label>
                <input class="form-control" type="text" name="name" id="name" value="{{$character->name}}">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descricao:</label>
                <textarea class="form-control" name="description" id="description">
                    {{$character->description}}
                </textarea>
                @error('description')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Imagem:</label>
                <input class="form-control" type="text" name="image" id="image" value="{{$character->image}}">
                @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Animes:</label><br>
                @foreach($works as $work)
                    @if($work->type == 0)
                        <input type="checkbox" class="btn-check" name="work[]" id="gender{{$work->id}}" autocomplete="off" value="{{$work->id}}"
                               @foreach($character->works as $cwork)
                            @if($cwork->id == $work->id)
                                checked
                            @endif
                            @endforeach>
                        <label class="btn btn-outline-primary" for="gender{{$work->id}}">{{$work->name}}</label>
                    @endif
                @endforeach
            </div>
            <div class="form-group">
                <label>Mangas:</label><br>
                @foreach($works as $work)
                    @if($work->type == 1)
                        <input type="checkbox" class="btn-check" name="work[]" id="gender{{$work->id}}" autocomplete="off" value="{{$work->id}}"
                        @foreach($character->works as $cwork)
                            @if($cwork->id == $work->id)
                                checked
                            @endif
                        @endforeach>
                        <label class="btn btn-outline-primary" for="gender{{$work->id}}">{{$work->name}}</label>
                    @endif
                @endforeach
            </div>
            <div class="form-group">
                <label>Filmes:</label><br>
                @foreach($works as $work)
                    @if($work->type == 2)
                        <input type="checkbox" class="btn-check" name="work[]" id="gender{{$work->id}}" autocomplete="off" value="{{$work->id}}"
                               @foreach($character->works as $cwork)
                                   @if($cwork->id == $work->id)
                                       checked
                            @endif
                            @endforeach>
                        <label class="btn btn-outline-primary" for="gender{{$work->id}}">{{$work->name}}</label>
                    @endif
                @endforeach
            </div>
            <div class="form-group">
                <button class="form-control btn btn-primary mt-3" type="submit">Editar</button>
            </div>
        </form>
    </div>
</x-app>
