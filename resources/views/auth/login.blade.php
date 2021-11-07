@extends('layouts.app')

@section('content')
<div class="container">
    @include('util.message')
    <div class="card text-center m-2 border-secondary">
            <div class="card-header border-secondary"><h5>{{ __('auth.login') }}</h5></div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.email') }}</label>
                        <div class="col-md-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('auth.password') }}</label>
                        <div class="col-md-4">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-check mx-auto">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                value="{{ old('remember') ? 'checked' : '' }}">
                            <label class="form-check-label" for="remember">
                                {{ __('auth.rememberMe') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mx-auto">
                            <button type="submit" class="btn btn-primary">
                                {{ __('auth.login') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection