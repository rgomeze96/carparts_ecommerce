@extends('layouts.app')
@section("title", $data["title"])
@section('content')
@include('util.message')
<!-- Portfolio Section-->
<div class="container">
    <!-- Portfolio Grid Items-->
    <div class="row">

    <table class="table table-dark table-hover bg-secondary text-light text-center">
            <thead>
                <th scope="col">{{ __('bitcoin.date') }}</th>
                <th scope="col">{{ __('bitcoin.price') }}</th>
            </thead>
            <tbody>
                @for($i = 0; $i < $data["numberOfResults"]; $i++)
                <tr>
                    <td>{{$data["dates"][$i]}}</td>
                    <td>${{number_format($data["prices"][$i],2, '.', ',')}}</td>                 
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>

@endsection