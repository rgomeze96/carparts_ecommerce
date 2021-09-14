@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @php
                $user=$data["user"]
                @endphp
                <div class="card-header">{{ $user->getName() }}</div>
                <div class="card-body">
                    <b>Client id:</b> {{ $user->getId() }}<br />
                    <b>Client name:</b> {{ $user->getName() }}<br /><br />
                    <b>Client user:</b> {{ $user->getUser() }}<br /><br />
                    <b>Client password:</b> {{ $user->getPassword() }}<br /><br />
                    <b>Client email:</b> {{ $user->getEmail() }}<br /><br />
                    <b>Client address:</b> {{ $user->getAddress() }}<br /><br />
                    <b>Client age:</b> {{ $user->getAge() }}<br /><br />
                    <b>Client city:</b> {{ $user->getCity() }}<br /><br />
                    <b>Client country:</b> {{ $user->getCountry() }}<br /><br />
                    <b>Client telephone:</b> {{ $user->getTelephone() }}<br /><br />
                    <b>Client balance:</b> {{ $user->getBalance() }}<br /><br />
                    
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection