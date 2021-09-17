@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($data["products"] as $product)
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="{{ $product->getImage() }}">
                    <div class="card-body"> 
                        <h5 class="card-title fw-bold"><a href="{{ route('product.show', $product->getId()) }}" style="color:gray">{{ $product->getId() }} - {{ $product->getName() }}</a></h5>
                        <p class="card-text">{{ __('product.list.price') }} {{ $product->getSalePrice() }}</p>
                        <p><a href="{{ route('product.addToCart', $product->getId()) }}">{{ __('product.list.addToCart') }}</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection