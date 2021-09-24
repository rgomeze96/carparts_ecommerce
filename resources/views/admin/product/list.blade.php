@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('util.message')
        <table class="table table-striped bg-secondary text-light text-center">
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
                        <a href="{{ route('admin.product.edit', $product->getId()) }}"><input class="btn btn-warning" type="submit" value="Edit"></a>
                            <form method="POST" action="{{ route('admin.product.destroy', $product->getId()) }}">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger ml-1" type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete &quot;{{ $product->getName() }}&quot;?')">
                            </form>
                    </td>
            </tbody>
            @endforeach
        </table>
    </div>
    @endsection