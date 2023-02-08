<x-app title="Adicionar Personagem">
    <form action="{{ route('characters.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input class="form-control input-dark" type="text" name="name" id="name">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descricao:</label>
                <textarea class="form-control input-dark" name="description" id="description">

                </textarea>
                @error('description')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Imagem:</label>
                <input class="form-control input-dark" type="text" name="image" id="image">
                @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Animes:</label><br>
                @foreach($works as $work)
                    @if($work->type == 0)
                        <input type="checkbox" class="btn-check" name="work[]" id="work{{$work->id}}" autocomplete="off" value="{{$work->id}}">
                        <label class="btn btn-outline-primary" for="work{{$work->id}}">{{$work->name}}</label>
                    @endif
                @endforeach
            </div>
            <div class="form-group">
                <label>Mangas:</label><br>
                @foreach($works as $work)
                    @if($work->type == 1)
                        <input type="checkbox" class="btn-check" name="work[]" id="work{{$work->id}}" autocomplete="off" value="{{$work->id}}">
                        <label class="btn btn-outline-primary" for="work{{$work->id}}">{{$work->name}}</label>
                    @endif
                @endforeach
            </div>
            <div class="form-group">
                <label>Filmes:</label><br>
                @foreach($works as $work)
                    @if($work->type == 2)
                        <input type="checkbox" class="btn-check" name="work[]" id="work{{$work->id}}" autocomplete="off" value="{{$work->id}}">
                        <label class="btn btn-outline-primary" for="work{{$work->id}}">{{$work->name}}</label>
                    @endif
                @endforeach
            </div>
            <div class="form-group">
                <button class="form-control btn btn-primary mt-3" type="submit">Adicionar</button>
            </div>
        </form>
    </div>
</x-app>
