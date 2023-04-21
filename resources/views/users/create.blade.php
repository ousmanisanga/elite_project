@extends('layouts.app')


@section('content')

<h1>Ajouter un utilisateur</h1>


@if ($errors->any())

<div class="alert alert-danger">

    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach

    </ul>

</div>

@endif

<form action="{{ url('users') }}" method="POST">
    @csrf

    <div class="form-group mb-3">
        <label for="name">Nom:</label>
        <input type="text" class="form-control" id="name" placeholder="Entrez le nom" name="name">
    </div>

    <div class="form-group mb-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
    </div>

    <div class="form-group mb-3">

        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="mot de passe" name="password">

    </div>
    <div class="form-group mb-3">

        <label for="role">Role:</label>
        <input type="number" class="form-control" id="role" placeholder="" name="role">

    </div>



    <button type="submit" class="btn btn-primary">Enregister</button>

</form>

@endsection