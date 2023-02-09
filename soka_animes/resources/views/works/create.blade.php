<x-app title="Adicionar Obras">
    <div class="container text-light">
        <div class="bg-dark pt-3 px-3 position-sticky sticky-top">
            <h4><b>ADICIONAR OBRA:</b></h4>
            <hr class="text-primary">
        </div>
        <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data" class="p-3 ">
            @csrf
            <div class="form-group mt-3">
                <div class="form-group col">
                    <label for="name">Nome:</label>
                    <input class="form-control input-dark" type="text" id="name" name="name" required>
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="synopsis">Sinopse:</label>
                <textarea class="form-control input-dark" name="synopsis" id="synopsis" cols="30" rows="10" required>
                </textarea>
                @error('synopsis')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row gap-2 d-flex justify-content-between mt-3">
                <div class="form-group col">
                    <label for="release_date">Data de Lancamento:</label>
                    <input class="form-control input-dark" type="date" name="release_date" id="release_date" required>
                    @error('release_date')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="chapters">Capitulos/Episodios:</label>
                    <input class="form-control input-dark" type="number" name="chapters" id="chapters" required>
                    @error('chapters')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="volumes">Volumes/Temporadas:</label>
                    <input class="form-control input-dark" type="number" name="volumes" id="volumes" required>
                    @error('volumes')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row gap-2 d-flex mt-3">
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
                    <label for="status">Status: </label>
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
            <div class="form-row gap-2 d-flex mt-3">
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
            <div class="form-group mt-3">
                <label for="searchGendersWork">
                    <b>
                        Gêneros:
                    </b>
                </label>
                <input type="text" id="searchGendersWork" class="form-control input-dark mb-2" placeholder="Pesquise por gêneros existentes ou adicione um novo no botão abaixo.">
                <div class="input-dark rounded-3">
                    <div class="sticky-top px-2 pt-1 pb-2 rounded-top bg-dark border-bottom border-primary">
                        <input type="button" class="btn-check" id="addGender" autocomplete="off" value="" data-bs-toggle="modal" data-bs-target="#addGenderModal">
                        <label class="btn btn-primary label-check fw-bold mx-1 mt-2 d-flex justify-content-center align-items-center text-light" for="addGender"><b><span class="fa-solid fa-plus fs-5"></span></b></label>
                    </div>
                    <div id="addWorkGenders" class="p-2"  style="overflow: auto; height: 200px">
                        @foreach ($genders as $gender)
                            <input type="checkbox" class="btn-check" name="gender[]" id="gender{{$gender->id}}" autocomplete="off" value="{{$gender->id}}">
                            <label class="btn btn-outline-primary label-check fw-bold mx-1 mt-2 d-flex align-items-center fs-5 justify-content-center" for="gender{{$gender->id}}"><b>{{$gender->gender}}</b></label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="searchCharactersWork">
                    <b>
                        Personagens:
                    </b>
                </label>
                <input type="text" id="searchCharactersWork" class="form-control input-dark mb-2" placeholder="Pesquise por personagens existentes ou adicione um novo no botão abaixo.">
                <div class="input-dark rounded-3">
                    <div class="sticky-top px-2 pt-1 pb-2 rounded-top bg-dark border-bottom border-primary">
                        <input type="button" class="btn-check" id="addGender" autocomplete="off" value="" data-bs-toggle="modal" data-bs-target="#addGenderModal">
                        <label class="btn btn-primary label-check fw-bold mx-1 mt-2 d-flex justify-content-center align-items-center text-light" for="addGender"><b><span class="fa-solid fa-plus fs-5"></span></b></label>
                    </div>
                    <div id="addWorkGenders" class="p-2"  style="overflow: auto; height: 200px">
                        @foreach ($genders as $gender)
                            <input type="checkbox" class="btn-check" name="gender[]" id="gender{{$gender->id}}" autocomplete="off" value="{{$gender->id}}">
                            <label class="btn btn-character-primary label-check fw-bold mx-1 mt-2 d-flex align-items-center fs-5 justify-content-center" for="gender{{$gender->id}}"><b>{{$gender->gender}}</b></label>
                        @endforeach
                    </div>
                </div>
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
                   $("#addWorkGenders").append(data);
               }
           });
       }
    });
</script>
