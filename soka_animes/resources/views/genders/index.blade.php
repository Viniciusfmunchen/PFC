<x-app title="Genrenciar Generos">
    <div class="container">
        <a class="btn btn-primary" href="{{ route('genders.create')}}">Adicionar Genero</a>
        <table class="table-light">
            <thead>
                <tr>
                    <th scope="col">
                        Genero
                    </th>
                </tr>
            </thead>
            <tbody>

                    @foreach($genders as $gender)
                        <tr>
                            <th scope="row">{{$gender->id}}</th>
                            <td>{{$gender->gender}}</td>
                            <td><a class="btn btn-primary" href="{{route('genders.edit', $gender->id)}}">Editar</a></td>
                            <td>
                                <form action="{{route('genders.destroy', $gender->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">	&#x1F5D1;</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

            </tbody>
        </table>
    </div>
</x-app>
