@extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
    <h3>{{$data["title"]}}</h3>
    <div class="col-md-6 mx-auto">
    <form novalidate method="GET" style="text-align: center" action="{{ route('product.list', ['nameFilter' => request()->nameFilter]) }}">
            {{csrf_field()}}
            <label hidden for="nameFilter"></label>
            <input onchange="this.form.submit()" type="text" id="nameFilter" name="nameFilter" class="form-control text-center mx-auto" placeholder="{{ __('product.list.findOnName') }}" value="{{ request()->input('nameFilter') }}">
        </form>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mt-3">

        @foreach($data["products"] as $product)
        <div class="col">
            <div class="card mt-2">
                <div class="card-image">
                    <a href="{{ route('product.show', $product->getId()) }}"><img style="height: 170px;" class="card-img" src="{{ asset($product->getImagePath()) }}" alt="{{$product->getId()}}"></a>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title"><a href="{{ route('product.show', $product->getId()) }}">{{ $product->getName() }}</a></h5>
                    <p class="card-text">{{ __('product.list.price') }} ${{number_format($product->getSalePrice(),2, '.', ',')}}</p>
                    <a href="{{ route('product.addToCart', $product->getId()) }}"><button class="btn btn-primary">{{ __('product.list.addToCart') }}</button></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection