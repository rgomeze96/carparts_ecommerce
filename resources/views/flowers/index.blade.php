@extends('layouts.app')
@section("title", $data["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>{{__('flowers.title')}}</h2>
    </div>
    <hr class="border-secondary">
    @if($data['validResponse'] == false)
    <div class="row text-center justify-content-center">
        <h5>{{__('flowers.noResults')}}</h5>
    </div>
    @else
    @for($i = 0; $i < $data['numberOfResults']; $i++)
    <div class="row shadow-lg rounded rounded-pill m-2">
        <div class="col m-2 text-center">
            <h4>{{__('flowers.name')}}: <a style="color: #800000" target="_blank"
                    href="{{$data['links'][$i] }}">{{ $data['flowerNames'][$i] }}</a>
            </h4>
            <h5>{{__('flowers.price')}}: ${{number_format($data['prices'][$i],2, '.', ',')}}</h5>
            <h5>{{__('flowers.amountsPerFlower')}}: {{$data['amountsPerFlower'][$i]}}</h5><br>
        </div>
    </div>
@endfor
@endif
<br>
</div>
@endsection
