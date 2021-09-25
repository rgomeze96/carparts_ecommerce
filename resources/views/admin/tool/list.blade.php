@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container-fluid">
    @include('util.message')
    <div class="row">
        <table class="table table-dark table-hover bg-secondary text-light text-center">
            <thead>
                <th scope="col">Loan ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Product ID</th>
                <th scope="col">Deposit Amount</th>
                <th scope="col">Loan Start Date</th>
                <th scope="col">Loan End Date</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </thead>
            @foreach($data["loanedTools"] as $loanedTool)
            <tbody>
                <tr>
                    <td>{{ $loanedTool->getId() }}</td>
                    <td>{{ $loanedTool->getUserId() }}</td>
                    <td>{{ $loanedTool->getProductId() }}</td>
                    <td>{{ $loanedTool->getDepositAmount() }}</td>
                    <td>{{ $loanedTool->getLoanDate() }}</td>
                    <td>{{ $loanedTool->getReturnDate() }}</td>
                    <td>{{ $loanedTool->getDescription() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit-{{ $loanedTool->getId() }}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-outline-danger ml-1" data-toggle="modal" data-target="#modal-delete-{{ $loanedTool->getId() }}">
                            Delete
                        </button>
                    </td>
                    <div class="modal fade" id="modal-edit-{{ $loanedTool->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form novalidate method="POST" style="text-align: center" action="{{ route('admin.toolloan.update', $loanedTool->getId()) }}">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content mx-auto text-center border border-warning">
                                        <div class="modal-header">
                                            <h5 class="modal-title mx-auto">
                                                {{ __('toolloan.edit.title') }}
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            <label for="productId">{{ __('toolloan.edit.userId') }}</label>
                                            <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Current User ID: {{ $loanedTool->getId() }}" name="userId" value="{{ $loanedTool->getUserId() }}" />
                                            <label for="productId">{{ __('toolloan.edit.productId') }}</label>
                                            <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Current Product ID: {{ $loanedTool->getId() }}" name="productId" value="{{ $loanedTool->getProductId() }}" />
                                            <label for="depositAmount">{{ __('toolloan.edit.depositAmount') }}</label>
                                            <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Current Deposit Amount: " name="depositAmount" value="{{ $loanedTool->getDepositAmount() }}" />
                                            <label for="loanDate">{{ __('toolloan.edit.loanDate') }}</label>
                                            <input class="form-control mb-2 col-md-6 mx-auto" type="date" placeholder="Enter return date for loan" name="loanDate" value="{{ $loanedTool->getLoanDate() }}" />
                                            <label for="returnDate">{{ __('toolloan.edit.returnDate') }}</label>
                                            <input class="form-control mb-2 col-md-6 mx-auto" type="date" placeholder="Enter return date for loan" name="returnDate" value="{{ $loanedTool->getReturnDate() }}" />
                                            <label for="description">{{ __('toolloan.edit.desc') }}</label>
                                            <textarea class="form-control col-md-6 mx-auto" name="description" rows="3">{{ $loanedTool->getDescription() }}</textarea>

                                        </div>
                                        <div class="modal-footer mx-auto">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">{{ __('toolloan.edit.button') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                    <div class="modal fade" id="modal-delete-{{ $loanedTool->getId() }}" tabindex="-1" role="dialog">
                        <form novalidate method="POST" style="text-align: center" action="{{ route('admin.product.destroy', $loanedTool->getId()) }}">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content mx-auto text-center bg-secondary border border-danger text-light">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-body">
                                        Are you sure you want to delete the Tool Loan with the ID: {{$loanedTool->getId()}}?
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