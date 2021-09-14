@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["product"]->getName() }}</div>
                <div class="card-body">

                    <b>Product name:</b>        {{ $data["product"]->getName()        }}<br />
                    <b>Product description:</b> {{ $data["product"]->getDescription() }}<br /><br />
                    <b>Product price:</b>       {{ $data["product"]->getSalePrice()   }}<br /><br />
                    <b>Product category:</b>    {{ $data["product"]->getCategory()    }}<br />
                    <b>Product brand:</b>       {{ $data["product"]->getBrand()       }}<br /><br />
                    <b>Product warranty:</b>    {{ $data["product"]->getWarranty()    }}<br /><br />
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
