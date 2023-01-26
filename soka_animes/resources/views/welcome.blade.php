<x-app title='Home'>
    <div class="container">
        <h1>Bem vindo!</h1>
        <h4>Soka Animes - Tristeza e Depressao</h4>
        <div id="bobin" class="mt-3">
            <a class="btn btn-primary" href="{{route('works.index')}}">Listagem Obras</a>
        </div>
        <div class="mt-3">
            <a class="btn btn-warning" href="{{route('characters.index')}}">Listagem dos Personagens</a>
        </div>
        <div class="mt-3">
            <a class="btn btn-primary" href="{{route('genders.index')}}">Listagem dos Generos</a>
        </div>
       
    </div>
   
</x-app>
