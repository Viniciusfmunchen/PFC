<x-app title="Redefinir">
    <div class="bg-dark pt-3 px-3 position-sticky sticky-top">
        <h4><b>REDEFINIR SENHA:</b></h4>
        <hr class="text-primary">
    </div>
    <div class="m-5 input-dark p-3 rounded-3">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <label for="email" class="">{{ __('Endereço de email: ') }}</label>
                <input id="email" type="email" class="form-control input-dark @error('email') is-invalid @enderror" name="email"
                       value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password" class="col-md-4 col-form-label">{{ __('Senha:') }}</label>
                <input id="password" type="password" class="form-control input-dark @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm"
                       class="col-md-4 col-form-label">{{ __('Confirmar senha:') }}</label>
                <input id="password-confirm" type="password" class="form-control input-dark" name="password_confirmation" required
                       autocomplete="new-password">
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary">
                    {{ __('Redefinir senha') }}
                </button>
            </div>
        </form>
    </div>
</x-app>
