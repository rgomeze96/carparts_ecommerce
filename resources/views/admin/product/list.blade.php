@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            
                                </li>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Product name</th>
                                        <th scope="col">Sale price</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Warranty</th>
                                        <th scope="col">Options</th>
                                        </tr>
                                    </thead>
                                    @foreach($data["products"] as $product)
                                        <tbody>
                                            <tr>
                                            <th scope="row">{{ $product->getId() }}</th>
                                            <td>{{ $product->getName() }}</td>
                                            <td>{{ $product->getSalePrice() }}</td>
                                            <td>{{ $product->getCategory() }}</td>
                                            <td>{{ $product->getBrand() }}</td>
                                            <td>{{ $product->getWarranty() }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.product.destroy', $product->getId()) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete &quot;{{ $product->getName() }}&quot;?')">
                                                </form>
                                                <br/>
                                                <a href="{{ route('admin.product.edit', $product->getId()) }}"><input type="submit" value="Edit"></a>
                                            </td>
                                        </tbody>
                                    @endforeach
                                </table>                                    
                                                      
    </div>
</div>
@endsection
