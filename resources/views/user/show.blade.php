@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    @include('util.message')
    <div class="card text-center border-secondary m-2 mx-auto">
        <div class="card-header border-secondary">
            <h5>{{__('user.show.accountInfo')}}</h5>
        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul id="errors">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <p><b>{{__('user.show.name')}}:</b> {{ $data["user"]->getName() }}<br /></p>
            <p><b>{{__('user.show.email')}}:</b> {{ $data["user"]->getEmail() }}<br /></p>
            <p><b>{{__('user.show.address')}}:</b> {{ $data["user"]->getAddress() }}<br /></p>
            <p><b>{{__('user.show.age')}}:</b> {{ $data["user"]->getAge() }}<br /></p>
            <p><b>{{__('user.show.city')}}:</b> {{ $data["user"]->getCity() }}<br /></p>
            <p><b>{{__('user.show.country')}}:</b> {{ $data["user"]->getCountry() }}<br /></p>
            <p><b>{{__('user.show.telephone')}}:</b> {{ $data["user"]->getTelephone() }}<br /></p>
            <p><b>{{__('user.show.balance')}}:</b> ${{number_format($data["user"]->getBalance(),2, '.', ',')}}<br /></p>
            <button type="button" class="btn btn-secondary" data-toggle="modal"
                data-target="#modal-edit-{{ $data['user']->getId() }}">
                {{ __('user.show.modifyAccountButton') }}
            </button>
        </div>
    </div>
    <div class="modal fade" id="modal-edit-{{ $data['user']->getId() }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form method="POST" style="text-align: center" action="{{ route('user.update', $data['user']->getId()) }}">
            {{csrf_field()}}
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <form class="mx-auto text-center" method="POST"
                    action="{{ route('user.update', $data['user']->getId()) }}">
                    <div class="modal-content mx-auto text-center border border-warning">
                        <div class="modal-header">
                            <h5 class="modal-title mx-auto">
                                {{ __('user.show.modifyTitle') }}
                            </h5>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <label for="name">{{ __('user.show.userName') }}</label>
                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter user ID"
                                name="name" value="{{ $data['user']->getName() }}" />

                            <label for="email">{{ __('user.show.email') }}</label>
                            <input type="email" class="form-control col-md-8 mx-auto" name="email"
                                value="{{ $data['user']->getEmail() }}">

                            <label for="address">{{ __('user.show.address') }}</label>
                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                placeholder="Enter deposit amount required" name="address"
                                value="{{ $data['user']->getAddress() }}" />

                            <label for="age">{{ __('user.show.age') }}</label>
                            <input class="form-control mb-2 col-md-8 mx-auto" min="1" type="number"
                                placeholder="Enter return date for loan" name="age"
                                value="{{ $data['user']->getAge() }}" />

                            <label for="city">{{ __('user.show.city') }}</label>
                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                placeholder="Enter return date for loan" name="city"
                                value="{{ $data['user']->getCity() }}" />

                            <label for="country">{{ __('user.show.country') }}</label>
                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                placeholder="Enter return date for loan" name="country"
                                value="{{ $data['user']->getCountry() }}" />

                            <label for="telephone">{{ __('user.show.telephone') }}</label>
                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                placeholder="Enter return date for loan" name="telephone"
                                value="{{ $data['user']->getTelephone() }}" />
                        </div>
                        <div class="modal-footer mx-auto">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('user.show.buttonClose') }}</button>
                            <button type="submit" class="btn btn-warning">{{ __('user.show.buttonUpdate') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection