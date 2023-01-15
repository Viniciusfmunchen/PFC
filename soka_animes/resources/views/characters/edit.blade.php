<x-app title="Adicionar Personagem">
    <div class="container">
        <form action="{{ route('characters.store', $character->id)}}" method="POST">
            @csrf
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
                <input class="form-control" type="text" name="image" id="image value="{{$character->image}}">
                @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button class="form-control btn btn-primary mt-3" type="submit">Adicionar</button>
            </div>
        </form>
    </div>
</x-app>
