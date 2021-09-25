@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="justify-content-center">
            @include('util.message')
            <div class="card">
                <div class="card-header text-center">{{ __('product.create.title') }}</div>
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
                    <form class="mx-auto text-center" method="POST" action="{{ route('admin.product.save') }}" enctype="multipart/form-data">
                        @csrf
                        <label for="name">{{ __('product.create.productName') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Enter product name" name="name" value="{{ old('name') }}" />

                        <label for="description">{{ __('product.create.desc') }}</label>
                        <textarea class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Enter product ID" name="description" rows="3" value="{{ old('description') }}" /></textarea>

                        <label for="salePrice">{{ __('product.create.salePrice') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Enter deposit amount required" name="salePrice" value="{{ old('salePrice') }}" />

                        <label for="cost">{{ __('product.create.cost') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Enter deposit amount required" name="cost" value="{{ old('cost') }}" />

                        <label for="category">{{ __('product.create.category') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Enter deposit amount required" name="category" value="{{ old('category') }}" />

                        <label for="brand">{{ __('product.create.brand') }}</label>
                        <input class="form-control col-md-6 mx-auto" type="text" placeholder="Enter deposit amount required" name="brand" value="{{ old('brand') }}">

                        <label for="warranty">{{ __('product.create.warranty') }}</label>
                        <input class="form-control col-md-6 mx-auto" type="text" placeholder="Enter deposit amount required" name="warranty" value="{{ old('warranty') }}">

                        <label for="quantity">{{ __('product.create.quantity') }}</label>
                        <input class="form-control col-md-6 mx-auto" type="number" min="1" placeholder="Enter deposit amount required" name="quantity" value="{{ old('quantity') }}">

                        <label for="image">{{ __('product.create.image') }}</label>
                        <input class="form-control col-md-6 mt-3 mx-auto" type="file" placeholder="Enter deposit amount required" name="image" accept="image/*" value="{{ old('image') }}">

                        <button type="submit" class="btn btn-primary mt-2">{{ __('product.create.button') }}</button>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection