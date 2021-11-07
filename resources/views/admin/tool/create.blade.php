@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container text-center">
    @include('util.message')
    <div class="card border-secondary m-2">
        <div class="card-header text-center border-secondary"><h5>{{ __('toolloan.create.title') }}</h5></div>
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
            <form class="mx-auto text-center" method="POST" action="{{ route('admin.toolloan.save') }}">
                @csrf
                <label for="userId">{{ __('toolloan.create.userId') }}</label>
                <select multiple class="form-control col-md-6 mx-auto" name="userId" id="userId">
                    @foreach($data["users"] as $user)
                    <option value="{{$user->getId()}}">{{$user->getName()}}</option>
                    @endforeach
                </select>
                <label class="mt-2" for="productId">{{ __('toolloan.create.productId') }}</label>
                <select class="form-control col-md-6 mx-auto text-center" name="productId">
                    @foreach($data["tools"] as $tool)
                    <option value="{{$tool->getId()}}">{{$tool->getName()}}</option>
                    @endforeach
                </select>
                <label class="mt-2" for="description">{{ __('toolloan.create.desc') }}</label>
                <textarea class="form-control col-md-6 mx-auto" name="description" rows="3"
                    value="{{ old('description') }}"></textarea>
                <label class="mt-2" for="depositAmount">{{ __('toolloan.create.depositAmount') }}</label>
                <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                    placeholder="Enter deposit amount required" name="depositAmount"
                    value="{{ old('depositAmount') }}" />
                <label class="mt-2" for="loanDate">{{ __('toolloan.create.loanDate') }}</label>
                <input class="form-control mb-2 col-md-6 mx-auto" type="date" name="loanDate"
                    value="{{ old('loanDate') }}" />
                <label class="mt-2" for="returnDate">{{ __('toolloan.create.returnDate') }}</label>
                <input class="form-control mb-2 col-md-6 mx-auto" type="date" name="returnDate"
                    value="{{ old('returnDate') }}" />
                <button type="submit" class="btn btn-primary mt-2">{{ __('toolloan.create.button') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection