<x-app title="Login">
    <div class="bg-dark pt-3 px-3 position-sticky sticky-top">
        <h4><b>LOGIN:</b></h4>
        <hr class="text-primary">
    </div>
    <div class="m-5 input-dark p-3 rounded-3">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="col-md-4 col-form-label text-light "><b>{{ __('Email:') }}</b></label>
                <input id="email" type="email" class="form-control input-dark @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required  placeholder="email...">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password" class="col-md-4 col-form-label  text-light"><b>{{ __('Senha') }}:</b></label>
                <input id="password" type="password" class="form-control input-dark @error('password') is-invalid @enderror"
                       name="password" required autocomplete="false" placeholder="senha">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                @if (Route::has('password.request'))
                    <a class="btn btn-link text-white-50" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif

                <button type="submit" class="btn btn-info">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
</x-app>
