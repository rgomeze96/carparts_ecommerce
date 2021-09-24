@extends('layouts.app')
@section("title", $data["title"])
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('util.message')
        <table class="table table-striped bg-secondary text-light text-center">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Age</th>
                <th scope="col">City</th>
                <th scope="col">Country</th>
                <th scope="col">Telephone</th>
                <th scope="col">Balance</th>
                <th scope="col">Action</th>
            </thead>
            @foreach($data["users"] as $user)
            <tbody>
                <tr>
                    <td scope="row">{{ $user->getId() }}</th>
                    <td>{{ $user->getName() }}</td>
                    <td>{{ $user->getEmail() }}</td>
                    <td>{{ $user->getAddress() }}</td>
                    <td>{{ $user->getAge() }}</td>
                    <td>{{ $user->getCity() }}</td>
                    <td>{{ $user->getCountry() }}</td>
                    <td>{{ $user->getTelephone() }}</td>
                    <td>{{ $user->getBalance() }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.user.destroy', $user->getId()) }}">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete &quot;{{ $user->getEmail() }}&quot;?')">
                        </form>
                        <br />
                    </td>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection