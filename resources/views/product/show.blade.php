@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["product"]->getName() }}</div>
                <div class="card-body">

                    <b>{{ __('product.show.name') }}     </b> {{ $data["product"]->getName()        }}<br/>
                    <b>{{ __('product.show.desc') }}     </b> {{ $data["product"]->getDescription() }}<br/><br/>
                    <b>{{ __('product.show.salePrice') }}</b> {{ $data["product"]->getSalePrice()   }}<br/><br/>
                    <b>{{ __('product.show.category') }} </b> {{ $data["product"]->getCategory()    }}<br/>
                    <b>{{ __('product.show.brand') }}    </b> {{ $data["product"]->getBrand()       }}<br/><br/>
                    <b>{{ __('product.show.warranty') }} </b>{{ $data["product"]->getWarranty()    }}<br/><br/>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
