@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container-fluid">
    @include('util.message')
    <div class="row">

        <table class="table table-dark table-hover bg-secondary text-light text-center">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Sale Price</th>
                <th scope="col">Category</th>
                <th scope="col">Brand</th>
                <th scope="col">Warranty</th>
                <th scope="col">Actions</th>
            </thead>
            @foreach($data["products"] as $product)
            <tbody>
                <tr>
                    <td scope="row">{{ $product->getId() }}</td>
                    <td>{{ $product->getName() }}</td>
                    <td>{{ $product->getSalePrice() }}</td>
                    <td>{{ $product->getCategory() }}</td>
                    <td>{{ $product->getBrand() }}</td>
                    <td>{{ $product->getWarranty() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit-{{ $product->getId() }}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-outline-danger ml-1" data-toggle="modal" data-target="#modal-delete-{{ $product->getId() }}">
                            Delete
                        </button>
                    </td>
                    <div class="modal fade" id="modal-edit-{{ $product->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form novalidate method="POST" style="text-align: center" action="{{ route('admin.product.update', $product->getId()) }}">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content mx-auto text-center border border-warning">
                                    <div class="modal-header">
                                        <h5 class="modal-title mx-auto">
                                            Update Product Information
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <form class="mx-auto text-center" method="POST" action="{{ route('admin.toolloan.save') }}">
                                            @csrf
                                            <label for="userId">{{ __('toolloan.create.userId') }}</label>
                                            <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Enter user ID" name="userId" value="{{ old('userId') }}" />
                                            <label for="productId">{{ __('toolloan.create.productId') }}</label>
                                            <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Enter product ID" name="productId" value="{{ old('productId') }}" />
                                            <label for="depositAmount">{{ __('toolloan.create.depositAmount') }}</label>
                                            <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Enter deposit amount required" name="depositAmount" value="{{ old('depositAmount') }}" />
                                            <label for="loanDate">{{ __('toolloan.create.loanDate') }}</label>
                                            <input class="form-control mb-2 col-md-6 mx-auto" type="date" placeholder="Enter return date for loan" name="loanDate" value="{{ old('loanDate') }}" />
                                            <label for="returnDate">{{ __('toolloan.create.returnDate') }}</label>
                                            <input class="form-control mb-2 col-md-6 mx-auto" type="date" placeholder="Enter return date for loan" name="returnDate" value="{{ old('returnDate') }}" />
                                            <label for="description">{{ __('toolloan.create.desc') }}</label>
                                            <textarea class="form-control col-md-6 mx-auto" name="description" rows="3" value="{{ old('description') }}"></textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-warning">Update Product</button>
                                    </div>
                                </div>
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
                                        Are you sure you want to delete the product: {{$product->getName()}}, with a quantity of {{$product->getQuantity()}} in inventory?
                                    </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete Product</button>
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