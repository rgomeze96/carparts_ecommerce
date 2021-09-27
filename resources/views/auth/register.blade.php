@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">{{ __('auth.Register') }}</div>
        <div class="card-body">
            <form class="text-center" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('user.create.address') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('user.create.age') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="age" value="{{ old('age') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('user.create.city') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('user.create.country') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('user.create.telephone') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('user.create.balance') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="balance" value="{{ old('balance') }}">
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary" style="margin-right: auto; margin-left: auto">
                        {{ __('Register') }}
                    </button>
            </form>
        </div>
    </div>
</div>
@endsection