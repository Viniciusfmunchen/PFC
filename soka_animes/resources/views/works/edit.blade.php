<x-app title="Editar Obras">
    <div class="container">
        <form action="{{ route('works.update', $work->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="form-group col">
                    <label for="name">Nome:</label>
                    <input class="form-control" type="text" id="name" name="name" required value="{{$work->name}}">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="release_date">Data de Lancamento:</label>
                <input class="form-control" type="date" name="release_date" id="release_date" required value="{{$work->release_date}}">
                @error('release_date')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row d-flex">
                <div class="form-group col-6">
                    <label for="chapters">Capitulos/Episodios:</label>
                    <input class="form-control" type="number" name="chapters" id="chapters" required value="{{$work->chapters}}">
                    @error('chapters')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="volumes">Volumes/Temporadas:</label>
                    <input class="form-control" type="number" name="volumes" id="volumes" required value="{{$work->volumes}}">
                    @error('volumes')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="synopsis">Sinopse:</label>
                <textarea class="form-control" name="synopsis" id="synopsis" cols="30" rows="10" required>
                    {{$work->synopsis}}
                </textarea>
                @error('synopsis')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row d-flex">
                <div class="form-group col">
                    <label for="producer">Produtora/Editora:</label>
                    <input class="form-control" type="text" name="producer" id="producer" required value="{{$work->producer}}">
                    @error('producer')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="author">Autor:</label>
                    <input class="form-control" type="text" name="author" id="author" required value="{{$work->author}}">
                    @error('author')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="status">Status de exibicao/ publicacao </label>
                    <select class="form-control" name="status" id="status" required>
                        <option value="0" @if($work->status == 0) selected @endif>Em Andamento</option>
                        <option value="1" @if($work->status == 1) selected @endif>Em Hiato</option>
                        <option value="2" @if($work->status == 2) selected @endif>Finalizado</option>
                    </select>
                    @error('status')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row d-flex">
                <div class="form-group col">
                    <label for="image">Link da Imagem:</label>
                    <input class="form-control" type="text" name="image" id="image" required value="{{$work->image}}">
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="type">Tipo da Obra:</label>
                    <select class="form-control" name="type" id="type" required>
                        <option value="0" @if($work->type == 0) selected @endif>Animes</option>
                        <option value="1" @if($work->type == 1) selected @endif>Manga</option>
                        <option value="2" @if($work->type == 2) selected @endif>Filme</option>
                    </select>
                    @error('type')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label> Gêneros: </label><br>
                @foreach ($genders as $gender)
                    <input type="checkbox" class="btn-check" name="gender[]" id="gender{{$gender->id}}" autocomplete="off" value="{{$gender->id}}"
                    @foreach($work->genders as $wgender)
                        @if($wgender->id == $gender->id)
                            checked
                        @endif
                    @endforeach>
                    <label class="btn btn-outline-primary" for="gender{{$gender->id}}">{{$gender->gender}}</label>
                @endforeach
            </div>
            <button class="btn btn-success mt-3" type="submit">Adicionar</button>

        </form>
    </div>
</x-app>

