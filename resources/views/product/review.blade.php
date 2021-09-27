@extends('layouts.app')
@section("title", $data["title"])
@section('content')
<div class="container">
@include('util.message')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-secondary">
                <div class="card-image">
                    <img style="max-height: 600px;" class="card-img" src="{{$data['product']->getImagePath()}}" alt="{{$data['product']->getId()}}">
                </div>
                <hr class="border-secondary">
                <div class="card-body text-center">
                    <h3>{{ __('product.show.storeReviewTitle') }} {{$data['product']->getName()}}</h3>
                    <b>{{ __('product.show.name') }} </b> {{ $data["product"]->getName()        }}<br />
                    <b>{{ __('product.show.desc') }} </b> {{ $data["product"]->getDescription() }}<br /><br />

                    <b>{{ __('product.show.category') }} </b> {{ $data["product"]->getCategory()    }}<br />
                    <b>{{ __('product.show.brand') }} </b> {{ $data["product"]->getBrand()       }}<br />
                    <b>{{ __('product.show.warranty') }} </b>{{ $data["product"]->getWarranty()    }}<br /><br />
                    <b>{{ __('product.show.salePrice') }}</b> ${{number_format($data["product"]->getSalePrice(),2, '.', ',')}}<br>
                    <form method="POST" action="{{ route('product.storeReview', $data['product']->getId()) }}">
                        @csrf
                        <label class="lead" for="newReviewRating">{{ __('product.show.newReviewRating') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto text-center" name="newReviewRating" type="number" min="1" max="5" placeholder="{{ __('product.show.newReviewRatingHelp') }}" />
                        <label class="lead mt-3" for="newReviewText">{{ __('product.show.newReviewText') }}</label>
                        <textarea class="form-control col-md-6 mx-auto" name="newReviewText" rows="3"></textarea>
                        <button type="submit" class="btn btn-secondary mt-2">{{ __('product.show.saveReviewButton') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection