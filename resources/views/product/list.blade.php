@extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
    <h3>{{$data["title"]}}</h3>
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
                action="{{ route('product.list', ['nameFilter' => request()->nameFilter]), 'categoryFilter' => request()->categoryFilter }}">
                {{csrf_field()}}
                <label hidden for="nameFilter"></label>
                <input onchange="this.form.submit()" type="text" id="nameFilter" name="nameFilter"
                    class="form-control text-center mx-auto" placeholder="{{ __('product.list.findOnName') }}"
                    value="{{ request()->input('nameFilter') }}">
            </form>
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
    </div>

    <hr class="border-secondary">
    <div class="row m-2">
        @foreach($data['products'] as $product)
        <div class="col-md-4 mb-5">
            <div class="card text-secondary font-weight-bold border-secondary">
                <div class="card-header text-center bg-light">
                    <h5><a class="text-secondary"
                            href="{{ route('product.show', $product->getId()) }}">{{ $product->getName() }}</a></h5>
                    <div>{{__('product.list.brand')}}: {{$product->getBrand()}}</div>
                </div>
                <div class="card-img">
                    <a href="{{ route('product.show', $product->getId()) }}"><img class="card-img"
                            style="height: 185px;" src="{{ asset($product->getImagePath()) }}" alt="" /></a>
                </div>
                <div class="card-body text-center">
                    <h5>{{__('product.list.price')}}: ${{number_format($product->getSalePrice(),2, '.', ',')}}</h5><br>
                    <a href="{{ route('product.addToCart', $product->getId()) }}"><button
                            class="btn btn-primary">{{ __('product.list.addToCart') }}</button></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection