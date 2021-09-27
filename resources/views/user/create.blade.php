@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('user.create.title') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.save') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('user.create.userName') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('user.create.password') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('user.create.email') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
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
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
