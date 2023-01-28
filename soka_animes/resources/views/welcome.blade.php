<x-app title='Home'>
    <div class="container">
        <h1>Bem vindo!</h1>
        Soka Animes - Tristeza e Depressao
        <div class="mt-3">
            <a class="btn btn-dark" href="{{route('works.index')}}">Listagem Obras</a>
        </div>
        <div class="mt-3">
            <a class="btn btn-primary" href="{{route('characters.index')}}">Listagem Personagens</a>
        </div>
        <div class="mt-3">
            <a class="btn btn-primary" href="{{route('genders.index')}}">Listagem Generos</a>
        </div>
    </div>
</x-app>
