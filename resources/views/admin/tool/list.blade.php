@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container-fluid">
    @include('util.message')
    <div class="row">
        <table class="table table-striped bg-secondary text-light text-center">
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

                    </td>
            </tbody>
            @endforeach
        </table>
    </div>
    @endsection