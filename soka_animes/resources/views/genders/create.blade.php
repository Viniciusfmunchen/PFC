<x-app title="Adicionar Genero">
    <form action="{{route('genders.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <label for="gender">Genero:</label>
        <input type="text" id="gender" name="gender" class="form-control input-dark">
        @error('gender')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <button class="btn btn-success" type="submit">Adicionar</button>
    </form>
</x-app>
