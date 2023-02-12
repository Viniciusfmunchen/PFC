<x-app title="Listagem Personagens">
    <div class="container">
        <div>
            <h1>Listagem de Personagens</h1>
            <a class="btn btn-primary" href="#">Welcome</a>
            <a class="btn btn-primary" href="{{route('characters.create')}}">Adicionar Personagem</a>
        </div>
        <div class="table-responsive">
            <table class="table-dark">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($characters as $character)
                        <tr class="row">
                            <th scope="row">{{$character->id}}</th>
                            <td>{{$character->name}}</td>
                            <td style="width: 50px">{{$character->description}}</td>
                            <td>{{$character->image}}</td>
                            <td><a class="btn btn-primary" href="{{route('characters.edit', $character->id)}}">Editar</a></td>
                            <td>
                                <form action="{{route('characters.destroy', $character->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">&#x1F5D1</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>        
        </div>

    </div>
</x-app>
