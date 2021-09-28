@extends('layouts.app')

@section('content')
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ __('home.portfolio') }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row">
            <!-- Portfolio Item 1-->
            @foreach($data['products'] as $product)
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="card text-secondary font-weight-bold border-primary">
                    <div class="card-header text-center bg-light">
                        <h5>{{$product->getName()}}</h5>
                    </div>
                    <div class="card-img">
                    <a href="{{ route('product.show', $product->getId()) }}"><img class="card-img" style="height: 20vw;" src="{{ $product->getImagePath() }}" alt="" /></a>
                    </div>
                    <div class="card-body text-center">
                        ${{number_format($product->getSalePrice(),2, '.', ',')}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- About Section-->
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">{{ __('home.toolTitle') }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-4 ml-auto">
                <p class="lead">{{ __('home.toolPara1') }}</p>
            </div>
            <div class="col-lg-4 mr-auto">
                <p class="lead">{{ __('home.toolPara2') }}</p>
            </div>
        </div>
        <!-- About Section Button-->
        <div class="text-center mt-4">
            <a href="{{ route('product.list', ['categoryFilter' => 'Tool']) }}">
                <button class="btn btn-outline-light">{{ __('home.toolButton') }}</button>
            </a>
        </div>
    </div>
</section>
@endsection