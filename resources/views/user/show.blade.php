@extends('layouts.master')

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
                    <b>CLient id:</b> {{ $user->getId() }}<br />
                    <b>CLient name:</b> {{ $user->getName() }}<br /><br />
                    <b>CLient user:</b> {{ $user->getUser() }}<br /><br />
                    <b>CLient password:</b> {{ $user->getPassword() }}<br /><br />
                    <b>CLient email:</b> {{ $user->getEmail() }}<br /><br />
                    <b>CLient address:</b> {{ $user->getAddress() }}<br /><br />
                    <b>CLient age:</b> {{ $user->getAge() }}<br /><br />
                    <b>CLient city:</b> {{ $user->getCity() }}<br /><br />
                    <b>CLient country:</b> {{ $user->getCountry() }}<br /><br />
                    <b>CLient telephone:</b> {{ $user->getTelephone() }}<br /><br />
                    <b>CLient balance:</b> {{ $user->getBalance() }}<br /><br />
                    
                    <form method="POST" action="{{route('user.destroy', $user->getId()) }}">
                        @csrf
                        @method('delete')
                            <input type="submit" value="Eliminar" onclick="return confirm('¿Do you what delete this user? &quot;{{ $data["user"]["id"] }}&quot;?')">
                    </form>
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection