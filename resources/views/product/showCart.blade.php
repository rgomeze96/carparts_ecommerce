@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($data["products"] as $product)
            <div class="col">
                <div class="card">
                    <div class="card-image">
                        <a href="{{ route('product.show', $product->getId()) }}"><img class="card-img" src="{{$product->getImagePath()}}" alt=""></a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold"><a href="{{ route('product.show', $product->getId()) }}" style="color:gray">{{ $product->getName() }}</a></h5>
                        <p class="card-text">{{ __('product.list.price') }} ${{number_format($product->getSalePrice(),2, '.', ',')}}</p>
                        <a href="{{ route('product.deleteFromCart', $product->getId()) }}"><button class="btn btn-primary">{{ __('product.showCart.deleteFromCart') }}</button></a>
                </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    <p><a href="{{ route('product.buy') }}"><button class="btn btn-success">{{ __('product.showCart.buy') }}</button></a></p>
    <p><a href="{{ route('product.deleteAllCart') }}"><button class="btn btn-danger">{{ __('product.showCart.deleteAllCart') }}</button></a></p>
</div>
@endsection