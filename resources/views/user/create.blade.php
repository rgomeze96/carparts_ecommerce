@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header">{{ $data["usuario"]["nombre"] }}</div>
                <div class="card-body">
                    <b>Usuario nombre:</b> {{ $data["usuario"]["nombre"] }}<br /><br />
                    <b>Usuario contraseña:</b> {{ $data["usuario"]["contraseña"] }}<br /><br />
                    <b>Nombre usuario:</b> {{ $data["usuario"]["usuario"] }}<br /><br />
                    <b>Usuario correo:</b> {{ $data["usuario"]["correo"] }}<br /><br />
                    <b>Usuario dirección:</b> {{ $data["usuario"]["direccion"] }}<br /><br />
                    <b>Usuario edad:</b> {{ $data["usuario"]["edad"] }}<br /><br />
                    <form method="POST" action="{{route('usuario.destroy', $data["usuario"]["id"]) }}">
                        @csrf
                        @method('delete')
                            <input type="submit" value="Eliminar" onclick="return confirm('¿Seguro que quiere eliminar este usuario? &quot;{{ $data["usuario"]["id"] }}&quot;?')">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
