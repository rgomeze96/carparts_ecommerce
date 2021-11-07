@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card border-secondary m-2">
        <div class="card-header text-center">
            @if(count($data["products"]) > 0)
            <h1>{{ __('product.showCart.yourCart') }} {{count($data["products"])}}
                {{ __('product.showCart.product') }}(s)
            </h1>
            @else
            <h3>{{ __('product.showCart.emptyCart') }}<a href="{{route('product.list')}}">
                    {{ __('product.showCart.here') }}</a></h3>
            @endif
            <h5>{{__('product.showCart.balance') }} ${{number_format($data["user"]->getBalance(),2, '.', ',')}}</h5>
        </div>
        <div class="card-body">
            <div class="container text-center">
                @foreach($data["products"] as $product)
                <div class="row mx-auto">
                    <a class="mx-auto" href="{{ route('product.show', $product->getId()) }}">
                        <img style="max-height: 250px; max-width: 250px" class="rounded rounded-circle"
                            src="{{asset($product->getImagePath())}}" alt="{{$product->getId()}}">
                    </a>
                </div>
                <h5>{{$product->getName()}}</h5>
                <h5>${{number_format($product->getSalePrice(),2, '.', ',')}}</h5>
                <a href="{{ route('product.deleteFromCart', $product->getId()) }}"><button
                        class="btn btn-outline-secondary">{{ __('product.showCart.deleteFromCart') }}</button></a>
                <hr class="border-secondary">
                @endforeach
                @if(count($data["products"]) > 0)
                <h3 class="text-primary">{{ __('product.showCart.total') }}
                    ${{number_format($data["products"]->sum('sale_price'),2, '.', ',')}}</h3>
                <p><a href="{{ route('product.buy') }}"><button
                            class="btn btn-success">{{ __('product.showCart.buy') }}</button></a></p>
                <p><a href="{{ route('product.deleteAllCart') }}"><button
                            class="btn btn-danger">{{ __('product.showCart.deleteAllCart') }}</button></a></p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
