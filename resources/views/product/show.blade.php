@extends('layouts.app')

@section('content')
<div class="container">
    @include('util.message')
    @if($errors->any())
            <div class="alert alert-danger">
                <ul id="errors">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    <div class="row justify-content-center">
        <div class="card ml-2 mr-2 mt-2 border-primary">
            <div class="card-image mx-auto">
                <img style="max-height: 400px; max-width: 400px" class="card-img" src="{{ asset($data['product']->getImagePath()) }}"
                    alt="{{$data['product']->getId()}}">
            </div>
            <div class="card-header text-center border-primary">
                <h4>{{ $data["product"]->getName() }}</h4>
            </div>
            <div class="card-body text-center">
                <b>{{ __('product.show.name') }} </b> {{ $data["product"]->getName()        }}<br />
                <b>{{ __('product.show.desc') }} </b> {{ $data["product"]->getDescription() }}<br /><br />

                <b>{{ __('product.show.category') }} </b> {{ $data["product"]->getCategory()    }}<br />
                <b>{{ __('product.show.brand') }} </b> {{ $data["product"]->getBrand()       }}<br />
                <b>{{ __('product.show.warranty') }} </b>{{ $data["product"]->getWarranty()    }}<br /><br />
                <b>{{ __('product.show.salePrice') }}</b>
                ${{number_format($data["product"]->getSalePrice(),2, '.', ',')}}<br>
                <b>{{ __('product.show.quantity') }} </b>{{ $data["product"]->getQuantity()    }}<br>
                @if($data["product"]->getQuantity() > 0)
                <a href="{{ route('product.addToCart', $data['product']->getId()) }}"><button
                        class="btn btn-primary mt-1">{{ __('product.list.addToCart') }}</button></a>
                @else
                <b>{{__('product.show.notAvailable') }}</b>
                @endif
            </div>
        </div>

    </div>
    <div class="row justify-content-center">
    <div class="card border-secondary m-2">
            <div class="card-header text-center border-secondary">
                <h4>{{ __('product.show.reviewTitle') }}</h4>
            </div>

            <div class="card-body m-2">
            <div class="container">
            @if($data["product"]["reviews"]->count() == 0)
                <div class="row mx-auto">
                    {{__('product.show.beTheFirst')}}
                </div>
                @else
                @foreach($data['product']['reviews'] as $review)
                <div class="row ml-2">
                    <h5>{{ __('product.show.customer') }}: {{$review['user']->getName()}}</h5><br>
                </div>
                <div class="row ml-2">
                    <b>{{ __('product.show.rating') }}: </b>
                    <div class="ml-2">
                        <span
                            class="fa fa-star custom-star @if($review->getRating() == 5 ||$review->getRating() == 4 || $review->getRating() == 3 || $review->getRating() == 2 || $review->getRating() == 1) checked @endif"></span>
                        <span
                            class="fa fa-star custom-star @if($review->getRating() == 5 ||$review->getRating() == 4 || $review->getRating() == 3 || $review->getRating() == 2) checked @endif"></span>
                        <span
                            class="fa fa-star custom-star @if($review->getRating() == 5 ||$review->getRating() == 4 || $review->getRating() == 3) checked @endif"></span>
                        <span
                            class="fa fa-star custom-star @if($review->getRating() == 5 ||$review->getRating() == 4) checked @endif"></span>
                        <span class="fa fa-star custom-star @if($review->getRating() == 5) checked @endif"></span>
                    </div>
                </div>
                <div class="row m-2">
                    <p><b>{{ __('product.show.experience') }}:</b> {{$review->getReviewText()}}</p>
                </div>
                <hr class="border-secondary">
                @endforeach
                @endif
                <div class="row mt-2">
                    <button type="button" class="btn btn-secondary mx-auto" data-toggle="modal"
                        data-target="#modal-addReview-{{ $data['product']->getId() }}">
                        {{ __('product.show.storeReviewButton') }}
                    </button>
                </div>
                <div class="modal fade" id="modal-addReview-{{ $data['product']->getId() }}" tabindex="-1"
                    role="dialog">
                    @if(Auth::user())
                    <form method="POST" style="text-align: center"
                        action="{{ route('product.storeReview', $data['product']->getId()) }}">
                        {{csrf_field()}}
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content mx-auto text-center border border-secondary">
                                <div class="modal-header">
                                    <h5 class="modal-title mx-auto">
                                        {{ __('product.show.storeReviewTitle') }} {{$data['product']->getName()}}
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <label class="lead"
                                        for="newReviewRating">{{ __('product.show.newReviewRating') }}</label>
                                    <input class="form-control mb-2 col-md-6 mx-auto text-center" type="number" min="1"
                                        max="5" placeholder="{{ __('product.show.newReviewRatingHelp') }}"
                                        name="newReviewRating" />
                                    <label class="lead mt-3"
                                        for="newReviewText">{{ __('product.show.newReviewText') }}</label>
                                    <textarea required class="form-control col-md-6 mx-auto" name="newReviewText"
                                        rows="3"></textarea>
                                </div>
                                <div class="modal-footer mx-auto">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit"
                                        class="btn btn-secondary">{{ __('product.show.saveReviewButton') }}</button>
                                </div>
                            </div>
                    </form>
                    @else
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content mx-auto text-center border border-secondary">
                            <div class="modal-header">
                                <h5 class="modal-title mx-auto">
                                    {{ __('product.show.storeReviewTitle') }} {{$data['product']->getName()}}
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="h5">
                                    {{ __('product.show.loginToReview') }}
                                </div>
                                <a href="{{route('login')}}">
                                    <div class="btn btn-secondary">
                                        {{__ ('product.show.loginButton')}}
                                    </div>
                                </a>
                            </div>
                            <div class="modal-footer mx-auto">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection