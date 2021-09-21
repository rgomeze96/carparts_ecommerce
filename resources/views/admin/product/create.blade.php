@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('product.create.product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.product.save') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('product.create.name') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('product.create.desc') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('product.create.salePrice') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="salePrice" value="{{ old('salePrice') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('product.create.category') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="category" value="{{ old('category') }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('product.create.brand') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="brand" value="{{ old('brand') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('product.create.warranty') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="warranty" value="{{ old('warranty') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Image</label>
                            
                            <div class="col-md-6">
                                <input type="file" name="image" accept="image/*" value="{{ old('image') }}"/>
                            </div>                                
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('product.create.button') }}
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
