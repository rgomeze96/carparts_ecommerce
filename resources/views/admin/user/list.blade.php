@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            
                                </li>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">address</th>
                                        <th scope="col">age</th>
                                        <th scope="col">city</th>
                                        <th scope="col">country</th>
                                        <th scope="col">telephone</th>
                                        <th scope="col">balance</th>
                                        </tr>
                                    </thead>
                                    @foreach($data["users"] as $user)
                                        <tbody>
                                            <tr>
                                            <th scope="row">{{ $user->getId() }}</th>
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
                                                    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete &quot;{{ $user->getEmail() }}&quot;?')">
                                                </form>
                                                <br/>
                                            </td>
                                        </tbody>
                                    @endforeach
                                </table>                                    
                                                      
    </div>
</div>
@endsection