@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container-fluid text-center">
    <h2>{{ __('product.manage.title') }}</h2>
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
        <div class="ml-auto mb-2 mr-2">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add-product">
                {{ __('product.manage.buttonAdd') }}
            </button>
        </div>
    </div>
    <div class="modal fade" id="modal-add-product" tabindex="-1" role="dialog">
        <form class="mx-auto text-center" method="POST" action="{{ route('admin.product.save') }}"
            enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content mx-auto text-center bg-light border-success text-secondary">
                    <div class="modal-body">
                        <h5>
                            {{ __('product.create.title') }}
                        </h5>
                        <label for="productName">{{ __('product.create.productName') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                            placeholder="{{ __('product.create.productNamePH') }}" name="productName"
                            value="{{ old('productName') }}" />

                        <label for="description">{{ __('product.create.desc') }}</label>
                        <textarea class="form-control mb-2 col-md-6 mx-auto" type="text"
                            placeholder="{{ __('product.create.descPH') }}" name="description" rows="3"
                            value="{{ old('description') }}" /></textarea>

                        <label for="salePrice">{{ __('product.create.salePrice') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                            placeholder="{{ __('product.create.salePricePH') }}" name="salePrice"
                            value="{{ old('salePrice') }}" />

                        <label for="cost">{{ __('product.create.cost') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                            placeholder="{{ __('product.create.costPH') }}" name="cost" value="{{ old('cost') }}" />

                        <label for="category">{{ __('product.create.category') }}</label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                            placeholder="{{ __('product.create.categoryPH') }}" name="category"
                            value="{{ old('category') }}" />

                        <label for="brand">{{ __('product.create.brand') }}</label>
                        <input class="form-control col-md-6 mx-auto" type="text"
                            placeholder="{{ __('product.create.brandPH') }}" name="brand" value="{{ old('brand') }}">

                        <label for="warranty">{{ __('product.create.warranty') }}</label>
                        <input class="form-control col-md-6 mx-auto" type="text"
                            placeholder="{{ __('product.create.warrantyPH') }}" name="warranty"
                            value="{{ old('warranty') }}">

                        <label for="quantity">{{ __('product.create.quantity') }}</label>
                        <input class="form-control col-md-6 mx-auto" type="number" min="1"
                            placeholder="{{ __('product.create.quantityPH') }}" name="quantity"
                            value="{{ old('quantity') }}">

                        <label class="mt-2" for="image">{{ __('product.create.image') }}</label><br>
                        <input class="col-md-6 mt-3 mx-auto text-center" type="file" name="image" accept="image/*"
                            value="{{ old('imagePath') }}"><br>
                    </div>
                    <div class="modal-footer mx-auto">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('product.manage.buttonClose') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('product.create.button') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <table class="table table-bordered table-dark table-hover text-center">
            <thead>
                <th scope="col">{{ __('product.manage.id') }}</th>
                <th scope="col">{{ __('product.manage.productName') }}</th>
                <th scope="col">{{ __('product.manage.salePrice') }}</th>
                <th scope="col">{{ __('product.manage.cost') }}</th>
                <th scope="col">{{ __('product.manage.quantity') }}</th>
                <th scope="col">{{ __('product.manage.category') }}</th>
                <th scope="col">{{ __('product.manage.brand') }}</th>
                <th scope="col">{{ __('product.manage.warranty') }}</th>
                <th scope="col">{{ __('product.manage.actions') }}</th>
            </thead>
            @foreach($data["products"] as $product)
            <tbody>
                <tr>
                    <td scope="row">{{ $product->getId() }}</td>
                    <a href="{{route('product.show', $product->getId())}}"><td>{{ $product->getName() }}</td></a>
                    <td>${{number_format($product->getSalePrice(),2, '.', ',')}}</td>
                    <td>${{number_format($product->getCost(),2, '.', ',')}}</td>
                    <td>{{ $product->getQuantity() }}</td>    
                    <td>{{ $product->getCategory() }}</td>
                    <td>{{ $product->getBrand() }}</td>
                    <td>{{ $product->getWarranty() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal"
                            data-target="#modal-edit-{{ $product->getId() }}">
                            {{ __('product.manage.buttonEdit') }}
                        </button>

                        @if($data["loanedTools"]->where('product_id', $product->getId())->count() == 0)
                        <button type="button" class="btn btn-outline-danger ml-1" data-toggle="modal"
                            data-target="#modal-delete-{{ $product->getId() }}">
                            {{ __('product.manage.buttonDelete') }}
                        </button>
                        @endif
                        <br>
                        @if($product->getCategory() == "Tool")
                        <button type="button" class="btn btn-outline-light mt-1" data-toggle="modal"
                            data-target="#modal-add-toolloan-{{$product->getId()}}">
                            {{ __('toolloan.create.loanButton') }}
                        </button>
                        @endif
                    </td>
                    <div class="modal fade" id="modal-edit-{{ $product->getId() }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form novalidate method="POST" style="text-align: center"
                            action="{{ route('admin.product.update', $product->getId()) }}"
                            enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <form class="mx-auto text-center" method="POST"
                                    action="{{ route('admin.product.update', $product->getId()) }}">
                                    <div class="modal-content mx-auto text-center border border-warning">
                                        <div class="modal-header">
                                            <h5 class="modal-title mx-auto">
                                                {{ __('product.manage.modifyTitle') }}
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            <label for="productName">{{ __('product.manage.productName') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                placeholder="Enter user ID" name="productName"
                                                value="{{ $product->getName() }}" />
                                            <label for="description">{{ __('product.manage.desc') }}</label>
                                            <textarea class="form-control col-md-8 mx-auto" name="description"
                                                rows="3">{{ $product->getDescription() }}</textarea>
                                            <label for="salePrice">{{ __('product.manage.salePrice') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                placeholder="Enter deposit amount required" name="salePrice"
                                                value="{{ $product->getSalePrice() }}" />
                                            <label for="cost">{{ __('product.manage.cost') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                placeholder="Enter return date for loan" name="cost"
                                                value="{{ $product->getCost() }}" />
                                            <label for="category">{{ __('product.manage.category') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                placeholder="Enter return date for loan" name="category"
                                                value="{{ $product->getCategory() }}" />
                                            <label for="brand">{{ __('product.manage.brand') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                placeholder="Enter return date for loan" name="brand"
                                                value="{{ $product->getBrand() }}" />
                                            <label for="warranty">{{ __('product.manage.warranty') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                placeholder="Enter return date for loan" name="warranty"
                                                value="{{ $product->getWarranty() }}" />
                                            <label for="quantity">{{ __('product.manage.quantity') }}</label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="number" min="1"
                                                placeholder="Enter return date for loan" name="quantity"
                                                value="{{ $product->getQuantity() }}" />
                                            <label class="mt-2" for="image">{{ __('product.create.image') }}</label><br>
                                            <input class="col-md-6 mt-3 mx-auto text-center" type="file" name="image"
                                                accept="image/*" value="{{ old('imagePath') }}"><br>
                                            <img class="card-img" src="{{asset($product->getImagePath())}}" alt="">
                                        </div>
                                        <div class="modal-footer mx-auto">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">{{ __('product.manage.buttonClose') }}</button>
                                            <button type="submit"
                                                class="btn btn-warning">{{ __('product.manage.buttonUpdate') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                    <div class="modal fade" id="modal-add-toolloan-{{$product->getId()}}" tabindex="-1" role="dialog">
                        <form class="mx-auto text-center" method="POST" action="{{ route('admin.toolloan.save') }}">
                            {{csrf_field()}}
                            <input type="hidden" name="productId" value="{{ $product->getId() }}">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content mx-auto text-center bg-light border-success text-secondary">
                                    <div class="modal-body">
                                        <h5>
                                            {{ __('toolloan.create.title') }}: {{$product->getName()}}
                                        </h5>
                                        <label for="userId">{{ __('toolloan.create.user') }}</label>
                                        <select required multiple class="form-control col-md-6 mx-auto" name="userId"
                                            id="userId">
                                            @foreach($data["customers"] as $customer)
                                            <option value="{{$customer->getId()}}">{{$customer->getName()}}</option>
                                            @endforeach
                                        </select>
                                        <label class="mt-2" for="description">{{ __('toolloan.create.desc') }}</label>
                                        <textarea class="form-control col-md-6 mx-auto" name="description" rows="3"
                                            value="{{ old('description') }}"></textarea>
                                        <label class="mt-2"
                                            for="depositAmount">{{ __('toolloan.create.depositAmount') }}</label><br>
                                        <small>{{ __('product.manage.cost') }}:
                                            ${{number_format($product->getCost(),2, '.', ',')}}</small>
                                        <input class="form-control col-md-6 mx-auto" type="text"
                                            placeholder="{{ __('toolloan.create.depositAmount') }}" name="depositAmount"
                                            value="{{ old('depositAmount') }}" />
                                        <label class="mt-2" for="loanDate">{{ __('toolloan.create.loanDate') }}</label>
                                        <input class="form-control mb-2 col-md-6 mx-auto" type="date" name="loanDate"
                                            value="{{ old('loanDate') }}" />
                                        <label class="mt-2"
                                            for="returnDate">{{ __('toolloan.create.returnDate') }}</label>
                                        <input class="form-control mb-2 col-md-6 mx-auto" type="date" name="returnDate"
                                            value="{{ old('returnDate') }}" />
                                    </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ __('product.manage.buttonClose') }}</button>
                                        <button type="submit"
                                            class="btn btn-success">{{ __('toolloan.create.createButton') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal fade" id="modal-delete-{{ $product->getId() }}" tabindex="-1" role="dialog">
                        <form novalidate method="POST" style="text-align: center"
                            action="{{ route('admin.product.destroy', $product->getId()) }}">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div
                                    class="modal-content mx-auto text-center bg-secondary border border-danger text-light">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-body">
                                        {{ __('product.manage.areYouSure') }} {{$product->getName()}}
                                        {{ __('product.manage.withA') }} {{$product->getQuantity()}}
                                        {{ __('product.manage.inInv') }}
                                    </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-outline-primary"
                                            data-dismiss="modal">{{ __('product.manage.buttonClose') }}</button>
                                        <button type="submit"
                                            class="btn btn-danger">{{ __('product.manage.buttonDeletePro')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </tr>
            </tbody>
            @endforeach
        </table>
        <div class="alert alert-danger mx-auto">{{__('product.manage.cannotDelete')}}</div>
    </div>
</div>
<div class="row justify-content-center">
    {{ $data["products"]->onEachSide(2)->links() }}
</div>
@endsection
</div>
