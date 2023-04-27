@extends('layouts.app')


@section('content')

<div class="row">

    <div class="col-lg-11">

        <h2>Gestion utilisateur</h2>

    </div>

    <div class="col-lg-1">
        <a class="btn btn-success" href="{{ url('users/create') }}">Ajouter</a>
    </div>

</div>



@if ($message = Session::get('success'))

<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>

@endif



<table class="table table-bordered">

    <tr>

        <th>No</th>
        <th>Name </th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
        <th>Actions</th>

    </tr>

    @foreach ($users as $key => $user)

    <tr>
        <td>{{++$key}}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->password }}</td>
        <td>{{ $user->role }}</td>

        <td>

            <form action="{{ url('users/'. $user->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <a class="btn btn-info" href="{{ url('users/'. $user->id) }}">Voir</a>
                <a class="btn btn-primary" href="{{ url('users/'. $user->id .'/edit') }}">Modifier</a>

                <button type="submit" class="btn btn-danger">Supprimer</button>

            </form>
        </td>

    </tr>

    @endforeach
</table>

@endsection