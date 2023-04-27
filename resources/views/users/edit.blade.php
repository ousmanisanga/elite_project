@extends('layouts.app')


@section('content')


<h1>Modifier un utilisateur</h1>


@if ($errors->any())

<div class="alert alert-danger">

    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

</div>

@endif

<form method="post" action="{{ url('users/'. $user->id) }}">
    @method('PATCH')
    @csrf


    <div class="form-group mb-3">

        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Entrer Nom" name="name" value="{{ $user->name }}">

    </div>

    <div class="form-group mb-3">

        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" placeholder="Entrer Email" name="email" value="{{ $user->email }}">

    </div>

    <div class="form-group mb-3">

        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Entrer le mot de passe" name="password" value="{{ $user->password }}">

    </div>

    <div class="form-group mb-3">

        <label for="role">Role:</label>
        <input type="role" class="form-control" id="role" placeholder="Le role" name="role" value="{{ $user->role }}">

    </div>


    <button type="submit" class="btn btn-primary">Enregistrer</button>

</form>

@endsection
