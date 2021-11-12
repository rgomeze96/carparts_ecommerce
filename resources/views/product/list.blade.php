@extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
    <h1>{{$data["title"]}}</h1>
    <hr class="border-secondary">
    <div class="row">
        <div class="col-md-2 mt-2">
            <h5>{{__('product.list.filters')}}: </h5>
        </div>
        <div class="col mx-auto">
            <form novalidate method="GET" style="text-align: center"
                action="{{ route('product.list', ['nameFilter' => request()->nameFilter]) }}">
                {{csrf_field()}}
                <label hidden for="nameFilter"></label>
                <input onchange="this.form.submit()" type="text" id="nameFilter" name="nameFilter"
                    class="form-control text-center mx-auto" placeholder="{{ __('product.list.findOnName') }}"
                    value="{{ request()->input('nameFilter') }}">
            </form>
        </div>
        <div class="col mx-auto">
            <form novalidate method="GET" style="text-align: center"
                action="{{ route('product.list', ['nameFilter' => request()->nameFilter, 'brandFilter' => request()->brandFilter]) }}">
                {{csrf_field()}}
                <select onchange="this.form.submit()" class="form-control" id="brandFilter" name="brandFilter">
                    <option selected>Filter by Brand</option>
                    @foreach($data["brands"] as $brand)
                    <option value="{{$brand->getBrand()}}">{{$brand->getBrand()}}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    <hr class="border-secondary">
    <div class="row m-2">
        <div class="container">
            @foreach($data['products'] as $product)
            <div class="row shadow-lg rounded rounded-pill">
                <div class="col-md-6 mt-2 mb-2">
                    <a href="{{ route('product.show', $product->getId()) }}"><img class="rounded rounded-pill shadow-lg"
                            style="height: 185px; max-width: 200px" src="{{ asset($product->getImagePath()) }}"
                            alt="{{$product->getId()}}" /></a>
                </div>
                <div class="col-md-6 mt-2 mb-2">
                    <h4><a class="text-secondary"
                            href="{{ route('product.show', $product->getId()) }}">{{ $product->getName() }}</a></h4>

                    <h5>{{__('product.list.price')}}: ${{number_format($product->getSalePrice(),2, '.', ',')}}</h5>
                    <h5>{{__('product.list.brand')}}: {{$product->getBrand()}}</h5><br>
                    <a href="{{ route('product.addToCart', $product->getId()) }}"><button
                            class="btn btn-primary">{{ __('product.list.addToCart') }}</button></a>
                </div>
            </div>
            <br>
            @endforeach
        </div>
    </div>
</div>
@endsection