@extends('layouts.app')
@section("title", $data["title"])
@section('content')
<div class="container-fluid text-center">
    <h3>{{ __('user.edit.title') }}</h3>
    @include('util.message')
    <div class="row">
    <div class="table-responsive">
        <table class="table table-dark table-hover bg-secondary text-light text-center">
            <thead>
                <th scope="col">{{ __('user.edit.id') }}</th>
                <th scope="col">{{ __('user.edit.userName') }}</th>
                <th scope="col">{{ __('user.edit.email') }}</th>
                <th scope="col">{{ __('user.edit.address') }}</th>
                <th scope="col">{{ __('user.edit.age') }}</th>
                <th scope="col">{{ __('user.edit.city') }}</th>
                <th scope="col">{{ __('user.edit.country') }}</th>
                <th scope="col">{{ __('user.edit.telephone') }}</th>
                <th scope="col">{{ __('user.edit.role') }}</th>
                <th scope="col">{{ __('user.edit.balance') }}</th>
                <th scope="col">{{ __('user.edit.actions') }}</th>
            </thead>
            @foreach($data["users"] as $user)
            <tbody>
                <tr>
                    <td scope="row">{{ $user->getId() }}</th>
                    <td>{{ $user->getName() }}</td>
                    <td>{{ $user->getEmail() }}</td>
                    <td>{{ $user->getAddress() }}</td>
                    <td>{{ $user->getAge() }}</td>
                    <td>{{ $user->getCity() }}</td>
                    <td>{{ $user->getCountry() }}</td>
                    <td>{{ $user->getTelephone() }}</td>
                    <td>{{ $user->getRole() }}</td>
                    <td>${{number_format($user->getBalance(),2, '.', ',')}}</td>
                    <td>
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit-{{ $user->getId() }}">
                            {{ __('user.edit.buttonEdit') }}
                        </button>
                        @if($data["loanedTools"]->where('user_id', $user->getId())->count() == 0)
                        <button type="button" class="btn btn-outline-danger ml-1" data-toggle="modal" data-target="#modal-delete-{{ $user->getId() }}">
                            {{ __('user.edit.buttonDelete') }}
                        </button>
                        @endif
                    </td>
                    <div class="modal fade" id="modal-edit-{{ $user->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form method="POST" style="text-align: center" action="{{ route('admin.user.update', $user->getId()) }}">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <form class="mx-auto text-center" method="POST" action="{{ route('admin.user.update', $user->getId()) }}">
                                    <div class="modal-content mx-auto text-center border border-warning">
                                        <div class="modal-header">
                                            <h5 class="modal-title mx-auto">
                                                {{ __('user.edit.modifyTitle') }}
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            <label for="name">{{ __('user.edit.userName') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter user ID" name="name" value="{{ $user->getName() }}" />

                                            <label for="email">{{ __('user.edit.email') }}</label>
                                            <input type="email" class="form-control col-md-8 mx-auto" name="email" value="{{ $user->getEmail() }}">

                                            <label for="address">{{ __('user.edit.address') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter deposit amount required" name="address" value="{{ $user->getAddress() }}" />

                                            <label for="age">{{ __('user.edit.age') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" min="1" type="number" placeholder="Enter return date for loan" name="age" value="{{ $user->getAge() }}" />

                                            <label for="city">{{ __('user.edit.city') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter return date for loan" name="city" value="{{ $user->getCity() }}" />

                                            <label for="country">{{ __('user.edit.country') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter return date for loan" name="country" value="{{ $user->getCountry() }}" />

                                            <label for="telephone">{{ __('user.edit.telephone') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter return date for loan" name="telephone" value="{{ $user->getTelephone() }}" />

                                            <label for="balance">{{ __('user.edit.balance') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="number" min="1" placeholder="Enter return date for loan" name="balance" value="{{ $user->getBalance() }}" />
                                            
                                            <div>{{ __('user.edit.role') }}</div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" value="admin">
                                                <label class="form-check-label">
                                                {{ __('user.edit.adminRole') }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" value="client"> 
                                                <label class="form-check-label">
                                                {{ __('user.edit.clientRole') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer mx-auto">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('user.edit.buttonClose') }}</button>
                                            <button type="submit" class="btn btn-warning">{{ __('user.edit.buttonUpdate') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                    <div class="modal fade" id="modal-delete-{{ $user->getId() }}" tabindex="-1" role="dialog">
                        <form novalidate method="POST" style="text-align: center" action="{{ route('admin.user.destroy', $user->getId()) }}">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content mx-auto text-center bg-secondary border border-danger text-light">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-body">
                                        {{ __('user.edit.areYouSure') }} {{$user->getName()}}
                                    </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">{{ __('user.edit.buttonClose') }}</button>
                                        <button type="submit" class="btn btn-danger">{{ __('user.edit.buttonDeleteUser')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    </div>
</div>
@endsection