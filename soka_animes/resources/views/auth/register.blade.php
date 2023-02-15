<x-app title="Cadastro">
    <div class="bg-dark pt-3 px-3 position-sticky sticky-top">
        <h4><b>CADASTRO:</b></h4>
        <hr class="text-primary">
    </div>
    <div class="m-5 input-dark p-3 rounded-3">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name" class="col-md-4 col-form-label text-light"><b>Nome de usuário:</b></label>
                <input id="name" type="text" class="form-control input-dark @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="email" class="col-md-4 col-form-label text-light"><b>Endereço de email:</b></label>
                <input id="email" type="email" class="form-control input-dark @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password" class="col-md-4 col-form-label text-light"><b>Senha:</b></label>
                <input id="password" type="password" class="form-control input-dark @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm" class="col-md-4 col-form-label text-light"><b>Confirmar senha:</b></label>
                <input id="password-confirm" type="password" class="form-control input-dark" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-info">
                    {{ __('Tatakae!') }}
                </button>
            </div>

        </form>
    </div>
</x-app>
