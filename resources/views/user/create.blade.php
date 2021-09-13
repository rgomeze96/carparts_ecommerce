@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header">Crear usuario</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('user.save') }}">
                    @csrf
                    <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" />
                    <input type="text" placeholder="User" name="user" value="{{ old('user') }}" />
                    <input type="text" placeholder="Password" name="password" value="{{ old('password') }}" />
                    <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" />
                    <input type="text" placeholder="Address" name="address" value="{{ old('address') }}" />
                    <input type="text" placeholder="Age" name="age" value="{{ old('age') }}" />
                    <input type="text" placeholder="City" name="city" value="{{ old('city') }}" />
                    <input type="text" placeholder="Country" name="country" value="{{ old('country') }}" />
                    <input type="text" placeholder="Telephone" name="telephone" value="{{ old('telephone') }}" />
                    <input type="text" placeholder="Balance" name="balance" value="{{ old('balance') }}" />
                    <input type="submit" value="Send" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<div class="row p-5">
        <div class="col-md-12">
            <ul id="errors">
            
            </ul>
        </div>
    </div>