@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">List of products</div>
                <div class="card-body">

                    <ul>
                        @foreach($data["products"] as $product)
                            
                                <li>
                                    <b>{{ $product->getId() }}</b> - 
                                    {{ $product->getName() }} : 
                                    {{ $product->getSalePrice() }} USD | 
                                    {{ $product->getCategory() }} |
                                    {{ $product->getBrand() }} |
                                    {{ $product->getWarranty() }}

                                    <form method="POST" action="{{ route('admin.product.destroy', $product->getId()) }}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete &quot;{{ $product->getName() }}&quot;?')">
                                    </form>

                                </li>                                    
                                                      
                        @endforeach
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
