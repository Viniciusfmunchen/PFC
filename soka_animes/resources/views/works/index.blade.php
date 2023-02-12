<x-app title="Listagem de Obras">
    <div class="container">
        <div class="mt-3">
            <a class="btn btn-primary" href="#">Welcome</a>
            <a class="btn btn-primary" href="{{route('works.create')}}">Adicionar Obra</a>
        </div>
        <div class="mt-3">
            <h1>Listagem Obras</h1>
            <table class="table-dark">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">Lancamento</th>
                        <th scope="col">Cpts/Eps</th>
                        <th scope="col">Vol/Temps</th>
                        <th scope="col">Sinopse</th>
                        <th scope="col">Prod/Edit</th>
                        <th scope="col">status</th>
                        <th scope="col">autor</th>
                        <th scope="col">Image</th>
                        <th scope="col">type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($works as $work)
                        <tr>
                            <th scope="row">{{$work->id}}</th>
                            <td>{{$work->name}}</td>
                            <td>{{$work->release_date}}</td>
                            <td>{{$work->chapters}}</td>
                            <td>{{$work->volumes}}</td>
                            <td>{{$work->synopsis}}</td>
                            <td>{{$work->producer}}</td>
                            @switch($work->status)
                                @case('0')
                                    <td>Em Andamento</td>
                                    @break
                                @case('1')
                                    <td>Em Hiato</td>
                                    @break
                                @case('2')
                                    <td>Finalizado</td>
                                    @break
                            @endswitch
                            <td>{{$work->author}}</td>
                            <td>{{$work->image}}</td>
                            @switch($work->type)
                                @case('0')
                                    <td>Anime</td>
                                    @break
                                @case('1')
                                    <td>Manga</td>
                                    @break
                                @case('2')
                                    <td>Filme</td>
                                    @break
                            @endswitch
                            <td><a class="btn btn-primary" href="{{route('works.edit', $work->id)}}">Editar</a></td>
                            <td>
                                <form action="{{route('works.destroy', $work->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">&#x1F5D1;</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app>
