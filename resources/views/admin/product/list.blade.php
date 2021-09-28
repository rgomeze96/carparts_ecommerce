@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container-fluid text-center">
    <h3>{{ __('product.edit.title') }}</h3>
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
    <div class="row">
        <table class="table table-dark table-hover bg-secondary text-light text-center">
            <thead>
                <th scope="col">{{ __('product.edit.id') }}</th>
                <th scope="col">{{ __('product.edit.productName') }}</th>
                <th scope="col">{{ __('product.edit.salePrice') }}</th>
                <th scope="col">{{ __('product.edit.cost') }}</th>
                <th scope="col">{{ __('product.edit.category') }}</th>
                <th scope="col">{{ __('product.edit.brand') }}</th>
                <th scope="col">{{ __('product.edit.warranty') }}</th>
                <th scope="col">{{ __('product.edit.actions') }}</th>
            </thead>
            @foreach($data["products"] as $product)
            <tbody>
                <tr>
                    <td scope="row">{{ $product->getId() }}</td>
                    <td>{{ $product->getName() }}</td>
                    <td>${{number_format($product->getSalePrice(),2, '.', ',')}}</td>
                    <td>${{number_format($product->getCost(),2, '.', ',')}}</td>
                    <td>{{ $product->getCategory() }}</td>
                    <td>{{ $product->getBrand() }}</td>
                    <td>{{ $product->getWarranty() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit-{{ $product->getId() }}">
                            {{ __('product.edit.buttonEdit') }}
                        </button>
                        @if($data["loanedTools"]->where('product_id', $product->getId())->count() == 0)
                        <button type="button" class="btn btn-outline-danger ml-1" data-toggle="modal" data-target="#modal-delete-{{ $product->getId() }}">
                            {{ __('product.edit.buttonDelete') }}
                        </button>
                        @endif
                    </td>
                    <div class="modal fade" id="modal-edit-{{ $product->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form novalidate method="POST" style="text-align: center" action="{{ route('admin.product.update', $product->getId()) }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <form class="mx-auto text-center" method="POST" action="{{ route('admin.product.update', $product->getId()) }}">
                                    <div class="modal-content mx-auto text-center border border-warning">
                                        <div class="modal-header">
                                            <h5 class="modal-title mx-auto">
                                                {{ __('product.edit.modifyTitle') }}
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            <label for="name">{{ __('product.edit.productName') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter user ID" name="name" value="{{ $product->getName() }}" />
                                            <label for="description">{{ __('product.edit.desc') }}</label>
                                            <textarea class="form-control col-md-8 mx-auto" name="description" rows="3">{{ $product->getDescription() }}</textarea>
                                            <label for="salePrice">{{ __('product.edit.salePrice') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter deposit amount required" name="salePrice" value="{{ $product->getSalePrice() }}" />
                                            <label for="cost">{{ __('product.edit.cost') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter return date for loan" name="cost" value="{{ $product->getCost() }}" />
                                            <label for="category">{{ __('product.edit.category') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter return date for loan" name="category" value="{{ $product->getCategory() }}" />
                                            <label for="brand">{{ __('product.edit.brand') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter return date for loan" name="brand" value="{{ $product->getBrand() }}" />
                                            <label for="warranty">{{ __('product.edit.warranty') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter return date for loan" name="warranty" value="{{ $product->getWarranty() }}" />
                                            <label for="quantity">{{ __('product.edit.quantity') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="number" min="1" placeholder="Enter return date for loan" name="quantity" value="{{ $product->getQuantity() }}" />

                                            <label class="mt-2" for="image">{{ __('product.create.image') }}</label><br>
                                            <input class="col-md-6 mt-3 mx-auto text-center" type="file" name="image" accept="image/*" value="{{ old('imagePath') }}"><br>
                                            <img class="card-img" src="{{asset($product->getImagePath())}}" alt="">

                                        </div>
                                        <div class="modal-footer mx-auto">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('product.edit.buttonClose') }}</button>
                                            <button type="submit" class="btn btn-warning">{{ __('product.edit.buttonUpdate') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                    <div class="modal fade" id="modal-delete-{{ $product->getId() }}" tabindex="-1" role="dialog">
                        <form novalidate method="POST" style="text-align: center" action="{{ route('admin.product.destroy', $product->getId()) }}">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content mx-auto text-center bg-secondary border border-danger text-light">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-body">
                                        {{ __('product.edit.areYouSure') }} {{$product->getName()}} {{ __('product.edit.withA') }} {{$product->getQuantity()}} {{ __('product.edit.inIn') }}
                                    </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">{{ __('product.edit.buttonClose') }}</button>
                                        <button type="submit" class="btn btn-danger">{{ __('product.edit.buttonDeletePro')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    @endsection