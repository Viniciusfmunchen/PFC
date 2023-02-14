<x-app title="Adicionar Personagem">
    <div class="bg-dark pt-3 px-3 position-sticky sticky-top">
        <h4><b>EDITAR PERSONAGEM:</b></h4>
        <hr class="text-primary">
    </div>
        <form action="{{ route('characters.update', $character->id)}}" method="POST" class="p-3">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="name">Nome:</label>
                <input class="form-control input-dark" type="text" name="name" id="name" value="{{$character->name}}">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="description">Descricao:</label>
                <textarea class="form-control input-dark" name="description" id="description">
                    {{$character->description}}
                </textarea>
                @error('description')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="image">Imagem:</label>
                <input class="form-control input-dark" type="text" name="image" id="image" value="{{$character->image}}">
                @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <label for="searchWorksCharacter" class="mt-3">Obras:</label>
            <input type="text" id="searchWorksCharacter" class="form-control input-dark mb-2" placeholder="Pesquise pelas obras do personagem ou relacione-o a outras">
            <div class="rounded-3">
                <div id="addWorkGenders" class="p-2"  style="overflow: auto; height: 200px">
                    @foreach ($works as $work)
                        <input type="checkbox" class="btn-check" name="work[]" id="work{{$work->id}}" autocomplete="off" value="{{$work->id}}"
                        @foreach($character->works as $cwork)
                            @if($cwork->id == $work->id)
                                checked
                            @endif
                            @endforeach>
                        <label class="btn btn-outline-anime label-check fw-bold mx-1 mt-2 d-flex align-items-center fs-5 justify-content-center workCharacterListed" for="work{{$work->id}}"><b>{{$work->name}}</b></label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <button class="form-control btn btn-primary mt-3" type="submit"><b>Salvar</b></button>
            </div>
        </form>
</x-app>
<script>
    $('#searchWorksCharacter').on('input', function() {
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
