@extends('auth.layout')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1">{{ __('Login') }}</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form class="mb-3" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email"
                        autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" name="password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="icheck-primary mb-3">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
            </form>

            <p class="mb-1">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </p>
            <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
        </div>
    </div>
    </div>
@endsection
