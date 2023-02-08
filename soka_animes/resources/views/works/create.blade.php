<x-app title="Adicionar Obras">
    <div class="container text-light">
        <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-group col">
                    <label for="name">Nome:</label>
                    <input class="form-control input-dark" type="text" id="name" name="name" required>
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="release_date">Data de Lancamento:</label>
                <input class="form-control input-dark" type="date" name="release_date" id="release_date" required>
                @error('release_date')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row d-flex">
                <div class="form-group col-6">
                    <label for="chapters">Capitulos/Episodios:</label>
                    <input class="form-control input-dark" type="number" name="chapters" id="chapters" required>
                    @error('chapters')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="volumes">Volumes/Temporadas:</label>
                    <input class="form-control input-dark" type="number" name="volumes" id="volumes" required>
                    @error('volumes')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="synopsis">Sinopse:</label>
                <textarea class="form-control input-dark" name="synopsis" id="synopsis" cols="30" rows="10" required>

                </textarea>
                @error('synopsis')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row d-flex">
                <div class="form-group col">
                    <label for="producer">Produtora/Editora:</label>
                    <input class="form-control input-dark" type="text" name="producer" id="producer" required>
                    @error('producer')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="author">Autor:</label>
                    <input class="form-control input-dark" type="text" name="author" id="author" required>
                    @error('author')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="status">Status de exibicao/ publicacao </label>
                    <select class="form-control input-dark" name="status" id="status" required>
                        <option class="bg-secondary" value="0">Em Andamento</option>
                        <option class="bg-secondary" value="1">Em Hiato</option>
                        <option class="bg-secondary" value="2">Finalizado</option>
                    </select>
                    @error('status')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row d-flex">
                <div class="form-group col">
                    <label for="image">Link da Imagem:</label>
                    <input class="form-control input-dark" type="text" name="image" id="image" required>
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="type">Tipo da Obra:</label>
                    <select class="form-control input-dark" name="type" id="type" required>
                        <option class="bg-secondary" value="0">Anime</option>
                        <option class="bg-secondary" value="1">Manga</option>
                    </select>
                    @error('type')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label> Gêneros: </label><br>
                <div id="checkbox_genders" class="d-inline-block">
                    @foreach ($genders as $gender)
                        <input type="checkbox" class="btn-check" name="gender[]" id="gender{{$gender->id}}" autocomplete="off" value="{{$gender->id}}">
                        <label class="btn btn-outline-primary text-light" for="gender{{$gender->id}}"><b>{{$gender->gender}}</b></label>
                    @endforeach
                </div>
                <input type="button" class="btn-check" id="addGender" autocomplete="off" value="" data-bs-toggle="modal" data-bs-target="#addGenderModal">
                <label class="btn btn-outline-primary text-light" for="addGender">
                    <b><span class="fa-solid fa-plus"></span></b>
                </label>
            </div>
            <div class="form-group">
                <label>Personagens: </label><br>
                @foreach($characters as $character)
                    <input type="checkbox" class="btn-check" name="character[]" id="character{{$character->id}}" autocomplete="off" value="{{$character->id}}">
                    <label class="btn btn-outline-light" for="character{{$character->id}}"><b>{{$character->name}}</b></label>
                @endforeach
                <button type="button" class="btn btn-md btn-outline-primary text-light m-t-10 fw-bold" data-bs-toggle="modal" data-bs-target="#addGenderModal"><span class="fa-solid fa-plus"></span></button>

            </div>
            <button class="btn btn-primary mt-3" type="submit">Adicionar</button>
        </form>
    </div>
    <div class="modal fade" id="addGenderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header border-info">
                    <h3>Adicionar novo genero:</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="gender">Nome do genero:</label>
                        <input type="text" name="gender" id="gender" class="form-control input-dark" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer border-info">
                    <button type="button" id="saveGender" class="btn btn-primary" data-bs-dismiss="modal"><b>
                            Salvar
                        </b></button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <b>Cancelar</b>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app>
<script>
    $('#saveGender').on('click', function(){
       $gender = $('#gender').val();
       if($gender.val !== ' '){
           $.ajax({
               type: 'POST',
               url: '{{ route('work.gender') }}',
               data: {
                    'gender' : $gender,
               },
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success: function(data) {
                   $("#checkbox_genders").append(data);
               }
           });
       }
    });
</script>
