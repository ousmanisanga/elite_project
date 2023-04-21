@extends('layouts.app')


@section('content')

<h1>Gestion utilisateur</h1>


<table class="table table-bordered">

    <tr>
        <th>Name:</th>
        <td>{{ $user->name }}</td>
    </tr>

    <tr>

        <th>Email:</th>
        <td>{{ $user->email }}</td>

    </tr>

    <tr>

        <th>Password:</th>
        <td>{{ $user->password }}</td>

    </tr>

    <tr>

        <th>Role:</th>
        <td>{{ $user->role }}</td>

    </tr>



</table>

@endsection