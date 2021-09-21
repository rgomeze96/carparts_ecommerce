@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('product.create.product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.product.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('product.create.name') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $data["product"]->getName() }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('product.create.desc') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" value="{{ $data["product"]->getDescription() }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('product.create.salePrice') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="salePrice" value="{{ $data["product"]->getSalePrice() }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('product.create.category') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="category" value="{{ $data["product"]->getCategory() }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('product.create.brand') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="brand" value="{{ $data["product"]->getBrand() }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('product.create.warranty') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="warranty" value="{{ $data["product"]->getWarranty() }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Image</label>
                            
                            <div class="col-md-6">
                                <input type="file" name="image" accept="image/*" value="{{ $data["product"]->getImage() }}"/>
                            </div>                                
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
