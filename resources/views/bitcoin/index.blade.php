@extends('layouts.app')

@section('content')
@include('util.message')
<!-- Portfolio Section-->
<div class="container">
    <!-- Portfolio Grid Items-->
    <div class="row">
        {!! $bitcoinChart->container() !!}
        {!! $bitcoinChart->script() !!}
    </div>
</div>

@endsection