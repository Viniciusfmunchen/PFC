<x-app title="Email">
    @if (session('status'))
        <div class="alert alert-primary" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="bg-dark pt-3 px-3 position-sticky sticky-top">
        <h4><b>REDEFINIR SENHA:</b></h4>
        <hr class="text-primary">
    </div>
    <div class="m-5 input-dark p-3 rounded-3">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email"><b>{{ __('Endereço de email:') }}</b></label>
                <input id="email" type="email"
                       class="form-control input-dark @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary form-control">
                    {{ __('Enviar link de recuperação de senha') }}
                </button>
            </div>
        </form>
    </div>
</x-app>
