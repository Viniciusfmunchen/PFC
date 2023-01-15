<x-app title="Adicionar Obras">
    <div class="container">
        <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-group col">
                    <label for="name">Nome:</label>
                    <input class="form-control" type="text" id="name" name="name" required>
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="release_date">Data de Lancamento:</label>
                <input class="form-control" type="date" name="release_date" id="release_date" required>
                @error('release_date')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row d-flex">
                <div class="form-group col-6">
                    <label for="chapters">Capitulos/Episodios:</label>
                    <input class="form-control" type="number" name="chapters" id="chapters" required>
                    @error('chapters')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="volumes">Volumes/Temporadas:</label>
                    <input class="form-control" type="number" name="volumes" id="volumes" required>
                    @error('volumes')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="synopsis">Sinopse:</label>
                <textarea class="form-control" name="synopsis" id="synopsis" cols="30" rows="10" required>

                </textarea>
                @error('synopsis')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row d-flex">
                <div class="form-group col">
                    <label for="producer">Produtora/Editora:</label>
                    <input class="form-control" type="text" name="producer" id="producer" required>
                    @error('producer')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="author">Autor:</label>
                    <input class="form-control" type="text" name="author" id="author" required>
                    @error('author')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="status">Status de exibicao/ publicacao </label>
                    <select class="form-control" name="status" id="status" required>
                        <option value="0">Em Andamento</option>
                        <option value="1">Em Hiato</option>
                        <option value="2">Finalizado</option>
                    </select>
                    @error('status')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row d-flex">
                <div class="form-group col">
                    <label for="image">Link da Imagem:</label>
                    <input class="form-control" type="text" name="image" id="image" required>
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="type">Tipo da Obra:</label>
                    <select class="form-control" name="type" id="type" required>
                        <option value="0">Animes</option>
                        <option value="1">Manga</option>
                        <option value="2">Filme</option>
                    </select>
                    @error('type')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Adicionar</button>
        </form>
    </div>
</x-app>

