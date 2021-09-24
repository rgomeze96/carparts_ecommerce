@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Tool Loan with ID: {{ $data["toolLoan"]->getId() }}</h4>
                </div>
                <div class="card-body">
                    <b>Tool name:</b> {{ $data["toolLoan"]->getProductName() }}<br />
                    <b>Tool Loaned to User with ID:</b> {{ $data["toolLoan"]->getUserId() }}<br>
                    <b>Product ID:</b> {{$data["toolLoan"]->getProductId()}}<br>
                    <b>Tool Description:</b> {{$data["toolLoan"]->getDescription() ?? 'N/A'}}<br>
                    <b>Deposit Amount:</b> ${{number_format($data["toolLoan"]->getDepositAmount(), 0, ".", ",")}}<br>
                    <b>Tool Cost:</b> ${{number_format($data["toolLoan"]->getCost(), 0, ".", ",")}}<br>
                    <b>Return Date:</b> {{date('d-m-Y', strtotime($data["toolLoan"]->getReturnDate()))}}
                    <form class="mx-auto" method="POST" action="{{ route('tool.destroy', $data['toolLoan']['id']) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger mt-2">Delete Loan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection