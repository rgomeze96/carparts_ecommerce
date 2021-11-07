@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container text-center">
    <div class="justify-content-center">
        @include('util.message')
        <div class="card border-secondary m-2">
            <div class="card-header text-center border-secondary">
                <h5>{{ __('product.create.title') }}</h5>
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
                <form class="mx-auto text-center" method="POST" action="{{ route('admin.product.save') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <label for="name">{{ __('product.create.productName') }}</label>
                    <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                        placeholder="{{ __('product.create.productNamePH') }}" name="name" value="{{ old('name') }}" />

                    <label for="description">{{ __('product.create.desc') }}</label>
                    <textarea class="form-control mb-2 col-md-6 mx-auto" type="text"
                        placeholder="{{ __('product.create.descPH') }}" name="description" rows="3"
                        value="{{ old('description') }}" /></textarea>

                    <label for="salePrice">{{ __('product.create.salePrice') }}</label>
                    <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                        placeholder="{{ __('product.create.salePricePH') }}" name="salePrice"
                        value="{{ old('salePrice') }}" />

                    <label for="cost">{{ __('product.create.cost') }}</label>
                    <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                        placeholder="{{ __('product.create.costPH') }}" name="cost" value="{{ old('cost') }}" />

                    <label for="category">{{ __('product.create.category') }}</label>
                    <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                        placeholder="{{ __('product.create.categoryPH') }}" name="category"
                        value="{{ old('category') }}" />

                    <label for="brand">{{ __('product.create.brand') }}</label>
                    <input class="form-control col-md-6 mx-auto" type="text"
                        placeholder="{{ __('product.create.brandPH') }}" name="brand" value="{{ old('brand') }}">

                    <label for="warranty">{{ __('product.create.warranty') }}</label>
                    <input class="form-control col-md-6 mx-auto" type="text"
                        placeholder="{{ __('product.create.warrantyPH') }}" name="warranty"
                        value="{{ old('warranty') }}">

                    <label for="quantity">{{ __('product.create.quantity') }}</label>
                    <input class="form-control col-md-6 mx-auto" type="number" min="1"
                        placeholder="{{ __('product.create.quantityPH') }}" name="quantity"
                        value="{{ old('quantity') }}">

                    <label class="mt-2" for="image">{{ __('product.create.image') }}</label><br>
                    <input class="col-md-6 mt-3 mx-auto text-center" type="file" name="image" accept="image/*"
                        value="{{ old('imagePath') }}"><br>
                    <button type="submit" class="btn btn-primary mt-5">{{ __('product.create.button') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection