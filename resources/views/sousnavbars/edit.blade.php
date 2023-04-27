@extends('layouts.app')

@section('content')
<h1>Modifier un lien</h1>

@if ($errors->any())

<div class="alert alert-danger">

    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

</div>

@endif

<form method="post" action="{{ url('sousnavbars/'. $sousnavbar->id) }}">
    @method('PATCH')
    @csrf


    <div class="form-group mb-3">

        <label for="title">title:</label>
        <input type="text" class="form-control" id="title" placeholder="Entrer le titre" name="title" value="{{ $sousnavbar->title }}">

    </div>




    <button type="submit" class="btn btn-primary">Enregistrer</button>




@endsection
