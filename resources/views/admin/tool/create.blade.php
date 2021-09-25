@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="justify-content-center">
            @include('util.message')
            <div class="card">
                <div class="card-header text-center">{{ __('toolloan.create.title') }}</div>
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
                        <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Enter user ID" name="userId" value="{{ old('userId') }}" />
                        <label for="productId">{{ __('toolloan.create.productId') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Enter product ID" name="productId" value="{{ old('productId') }}" />
                        <label for="depositAmount">{{ __('toolloan.create.depositAmount') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Enter deposit amount required" name="depositAmount" value="{{ old('depositAmount') }}" />
                        <label for="loanDate">{{ __('toolloan.create.loanDate') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="date" name="loanDate" value="{{ old('loanDate') }}" />
                        <label for="returnDate">{{ __('toolloan.create.returnDate') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="date" name="returnDate" value="{{ old('returnDate') }}" />
                        <label for="description">{{ __('toolloan.create.desc') }}</label>
                        <textarea class="form-control col-md-6 mx-auto" name="description" rows="3" value="{{ old('description') }}"></textarea>
                        <button type="submit" class="btn btn-primary mt-2">Borrow Tool</button>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection