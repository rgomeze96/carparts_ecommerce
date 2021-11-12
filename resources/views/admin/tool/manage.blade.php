@extends('layouts.app')
@section("title", $data["title"])
@section('content')
<div class="container-fluid text-center">
    @include('util.message')
    <h3>{{ __('toolloan.edit.title') }}</h3>
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
                <th scope="col">{{ __('toolloan.edit.loanId') }}</th>
                <th scope="col">{{ __('toolloan.edit.userName') }}</th>
                <th scope="col">{{ __('toolloan.edit.toolName') }}</th>
                <th scope="col">{{ __('toolloan.edit.depositAmount') }}</th>
                <th scope="col">{{ __('toolloan.edit.loanStart') }}</th>
                <th scope="col">{{ __('toolloan.edit.loanEnd') }}</th>
                <th scope="col">{{ __('toolloan.edit.description') }}</th>
                <th scope="col">{{ __('toolloan.edit.actions') }}</th>
            </thead>
            @foreach($data["loanedTools"] as $loanedTool)
            <tbody>
                <tr>
                    <td>{{ $loanedTool->getId() }}</td>
                    <td>{{ $data["users"]->where('id', $loanedTool->getUserId())->first()->getName() }}</td>
                    <td>{{ $data['tools']->where('id', $loanedTool->getProductId())->first()->getName()}}</td>
                    <td>${{number_format($loanedTool->getDepositAmount(),2, '.', ',')}}</td>
                    <td>{{ $loanedTool->getLoanDate() }}</td>
                    <td>{{ $loanedTool->getReturnDate() }}</td>
                    <td>{{ $loanedTool->getDescription() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-warning mt-1" data-toggle="modal" data-target="#modal-edit-{{ $loanedTool->getId() }}">
                            {{ __('toolloan.edit.editButton') }}
                        </button>
                        <button type="button" class="btn btn-outline-danger ml-1 mt-1" data-toggle="modal" data-target="#modal-delete-{{ $loanedTool->getId() }}">
                            {{ __('toolloan.edit.deleteButton') }}
                        </button>
                    </td>
                    <div class="modal fade" id="modal-edit-{{ $loanedTool->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form novalidate method="POST" style="text-align: center" action="{{ route('admin.toolloan.update', $loanedTool->getId()) }}">
                            {{csrf_field()}}
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content mx-auto text-center border border-warning">
                                    <div class="modal-header">
                                        <h5 class="modal-title mx-auto">
                                            {{ __('toolloan.edit.modifyTitle') }}
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        @csrf
                                        <label for="userId">{{ __('toolloan.edit.modifyUserId') }}</label>
                                        <select multiple class="form-control col-md-6 mx-auto" name="userId" id="userId">
                                            @foreach($data["users"] as $user)
                                            @if($user->getId() == $loanedTool->getUserId())
                                            <option selected value="{{$user->getId()}}">
                                                {{$user->getName()}}
                                            </option>
                                            @else
                                            <option value="{{$user->getId()}}">
                                                {{$user->getName()}}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <small>{{ __('toolloan.edit.userHelp') }}</small><br>
                                        <label class="mt-1" for="productId">{{ __('toolloan.edit.modifyProductId') }}</label>
                                        <select class="form-control col-md-6 mx-auto text-center" name="productId">
                                            <option>{{ __('toolloan.edit.selectNew') }}</option>
                                            @foreach($data["tools"] as $tool)
                                            <option value="{{$tool->getId()}}">{{$tool->getName()}}</option>
                                            @endforeach
                                        </select>
                                        <label for="depositAmount">{{ __('toolloan.edit.modifyDepositAmount') }}</label>
                                        <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Current Deposit Amount: " name="depositAmount" value="{{number_format($loanedTool->getDepositAmount(),2, '.', ',')}}" />
                                        <label for="loanDate">{{ __('toolloan.edit.loanDate') }}</label>
                                        <input class="form-control mb-2 col-md-6 mx-auto" type="date" placeholder="Enter return date for loan" name="loanDate" value="{{ $loanedTool->getLoanDate() }}" />
                                        <label for="returnDate">{{ __('toolloan.edit.returnDate') }}</label>
                                        <input class="form-control mb-2 col-md-6 mx-auto" type="date" placeholder="Enter return date for loan" name="returnDate" value="{{ $loanedTool->getReturnDate() }}" />
                                        <label for="description">{{ __('toolloan.edit.desc') }}</label>
                                        <textarea class="form-control col-md-6 mx-auto" name="description" rows="3">{{ $loanedTool->getDescription() }}</textarea>
                                    </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('toolloan.edit.closeButton') }}</button>
                                        <button type="submit" class="btn btn-warning">{{ __('toolloan.edit.confirmEdit') }}</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </tr>
                <div class="modal fade" id="modal-delete-{{ $loanedTool->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <form novalidate method="POST" action="{{ route('admin.toolloan.destroy', $loanedTool->getId()) }}">
                        {{csrf_field()}}
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content mx-auto text-center bg-secondary border border-danger text-light">
                                <input type="hidden" name="_method" value="DELETE">
                                <div class="modal-body">
                                    {{ __('toolloan.edit.deleteMessage') }} {{$loanedTool->getId()}}?
                                </div>
                                <div class="modal-footer mx-auto">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">{{ __('toolloan.edit.closeButton') }}</button>
                                    <button type="submit" class="btn btn-danger">{{ __('toolloan.edit.confirmDelete') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection