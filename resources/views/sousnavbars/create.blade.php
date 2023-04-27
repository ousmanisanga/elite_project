@extends('layouts.app')

@section('content')
<h1>Ajouter un lien</h1>

@if ($errors->any())

<div class="alert alert-danger">

    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach

    </ul>

</div>

@endif


<form action="{{ url('sousnavbars') }}" method="POST">
    @csrf

    <div class="form-group mb-3">
        <label for="title">titre:</label>
        <input type="text" class="form-control" id="title" placeholder="Entrez le titre" name="title">
    </div>


    <button type="submit" class="btn btn-primary">Enregister</button>

</form>
@endsection
