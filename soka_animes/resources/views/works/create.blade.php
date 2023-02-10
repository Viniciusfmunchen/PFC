<x-app title="Adicionar Obras">
    <div class="container text-light">
        <div class="bg-dark pt-3 px-3 position-sticky sticky-top">
            <h4><b>ADICIONAR OBRA:</b></h4>
            <hr class="text-primary">
        </div>
        <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data" class="p-3 ">
            @csrf
            <div class="form-group">
                <div class="form-group col">
                    <label for="name">Nome:</label>
                    <input class="form-control input-dark" type="text" id="name" name="name" required>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="synopsis">Sinopse:</label>
                <textarea class="form-control input-dark" name="synopsis" id="synopsis" cols="30" rows="10" required>
                </textarea>
            </div>
            <div class="form-row gap-2 d-flex justify-content-between mt-3">
                <div class="form-group col">
                    <label for="release_date">Data de Lancamento:</label>
                    <input class="form-control input-dark" type="date" name="release_date" id="release_date" required>
                </div>
                <div class="form-group col">
                    <label for="chapters">Capitulos/Episodios:</label>
                    <input class="form-control input-dark" type="number" name="chapters" id="chapters" required>
                </div>
                <div class="form-group col">
                    <label for="volumes">Volumes/Temporadas:</label>
                    <input class="form-control input-dark" type="number" name="volumes" id="volumes" required>
                </div>
            </div>
            <div class="form-row gap-2 d-flex mt-3">
                <div class="form-group col">
                    <label for="producer">Produtora/Editora:</label>
                    <input class="form-control input-dark" type="text" name="producer" id="producer" required>
                </div>
                <div class="form-group col">
                    <label for="author">Autor:</label>
                    <input class="form-control input-dark" type="text" name="author" id="author" required>
                </div>
                <div class="form-group col">
                    <label for="status">Status: </label>
                    <select class="form-control input-dark" name="status" id="status" required>
                        <option class="bg-secondary" value="0">Em Andamento</option>
                        <option class="bg-secondary" value="1">Em Hiato</option>
                        <option class="bg-secondary" value="2">Finalizado</option>
                    </select>
                </div>
            </div>
            <div class="form-row gap-2 d-flex mt-3">
                <div class="form-group col">
                    <label for="image">Link da Imagem:</label>
                    <input class="form-control input-dark" type="text" name="image" id="image" required>
                </div>
                <div class="form-group col">
                    <label for="type">Tipo da Obra:</label>
                    <select class="form-control input-dark" name="type" id="type" required>
                        <option class="bg-secondary" value="0">Anime</option>
                        <option class="bg-secondary" value="1">Manga</option>
                    </select>
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
                        <input type="button" class="btn-check" id="addGender" autocomplete="off" data-bs-toggle="modal" data-bs-target="#addGenderModal">
                        <label class="btn btn-gender label-check fw-bold mx-1 mt-2 d-flex justify-content-center align-items-center text-light" for="addGender"><b><span class="fa-solid fa-plus fs-5"></span></b></label>
                    </div>
                    <div id="addWorkGenders" class="p-2"  style="overflow: auto; height: 200px">
                        @foreach ($genders as $gender)
                            <input type="checkbox" class="btn-check" name="gender[]" id="gender{{$gender->id}}" autocomplete="off" value="{{$gender->id}}">
                            <label class="btn btn-outline-gender label-check fw-bold mx-1 mt-2 d-flex align-items-center fs-5 justify-content-center workGenderListed" for="gender{{$gender->id}}"><b>{{$gender->gender}}</b></label>
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
                        <input type="button" class="btn-check" id="addCharacter" autocomplete="off" data-bs-toggle="modal" data-bs-target="#addCharacterModal">
                        <label class="btn btn-character label-check fw-bold mx-1 mt-2 d-flex justify-content-center align-items-center" for="addCharacter"><b><span class="fa-solid fa-plus fs-5"></span></b></label>
                    </div>
                    <div id="addWorkCharacters" class="p-2"  style="overflow: auto; height: 200px">
                        @foreach ($characters as $character)
                            <input type="checkbox" class="btn-check" name="character[]" id="character{{$character->id}}" autocomplete="off" value="{{$character->id}}">
                            <label class="btn btn-outline-character label-check fw-bold mx-1 mt-2 d-flex align-items-center fs-5 justify-content-center workCharacterListed" id="btnAdd" for="character{{$character->id}}"><b>{{$character->name}}</b></label>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary mt-3" type="submit">Adicionar Obra</button>
            </div>
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
                        <input type="text" name="gender" id="workGender" class="form-control input-dark" autocomplete="off">
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

    <div class="modal fade" id="addCharacterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header border-info">
                    <h3>Adicionar novo personagem:</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="gender">Nome do personagem:</label>
                        <input type="text" name="name" id="workCharacterName" class="form-control input-dark" autocomplete="off" placeholder="Nome...">
                    </div>
                    <div class="form-group mt-3">
                        <label for="gender">Nome do personagem:</label>
                        <textarea class="form-control input-dark" name="description" id="workCharacterDescription" cols="30" rows="10" placeholder="Descrição..."></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="gender">Imagem do personagem (link):</label>
                        <input type="text" name="image" id="workCharacterImage" class="form-control input-dark" autocomplete="off" placeholder="Imagem...">
                    </div>
                </div>
                <div class="modal-footer border-info">
                    <button type="button" id="saveCharacter" class="btn btn-primary" data-bs-dismiss="modal"><b>
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
       $gender = $('#workGender').val();
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
                   console.log(data);
                   $('#addWorkGenders').prepend(data);
                   $('#workGender').val('');
               }
       });
    });

    $('#saveCharacter').on('click', function(){
        $name = $('#workCharacterName').val();
        $description = $('#workCharacterDescription').val();
        $image = $('#workCharacterImage').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('work.character') }}',
                data: {
                    'name' : $name,
                    'description' : $description,
                    'image' : $image,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#addWorkCharacters").prepend(data);
                    $('#workCharacterName').val('');
                    $('#workCharacterDescription').val('');
                    $('#workCharacterImage').val('');
                }
        });
    })

    $('#searchGendersWork').on('input', function() {
        var searchGender = $(this).val().toLowerCase();
        $('.workGenderListed').each(function() {
            if ($(this).text().toLowerCase().includes(searchGender)) {
                console.log($(this).text)
                $(this).removeClass('d-none')
            } else {
                $(this).addClass('d-none');
            }
        });
    });

    $('#searchCharactersWork').on('input', function() {
        var searchCharacter = $(this).val().toLowerCase();
        console.log(searchCharacter);
        $('.workCharacterListed').each(function() {
            if ($(this).text().toLowerCase().includes(searchCharacter)) {
                console.log($(this).text)
                $(this).removeClass('d-none')
            } else {
                $(this).addClass('d-none');
            }
        });
    });

</script>
