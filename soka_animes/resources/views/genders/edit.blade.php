<x-app title="Editar Genero">
    <form action="{{route('genders.update', $gender->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="gender">Genero:</label>
        <input type="text" id="gender" name="gender" value="{{$gender->gender}}" placeholder="Genero">

        @error('gender')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <button class="btn btn-success" type="submit">Editar</button>
    </form>
</x-app>
