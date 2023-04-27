@extends('layouts.app')


@section('content')

<div class="row">

    <div class="col-lg-11">

        <h2>Menu de navigation</h2>

    </div>

    <div class="col-lg-1">
        <a class="btn btn-success" href="{{ url('navbars/create') }}">Ajouter</a>
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
        <th>title</th>
        <th>url</th>
        <th>Actions</th>

    </tr>

    @foreach ($navbars as $key => $navbar)

    <tr>
        <td>{{++$key}}</td>
        <td>{{ $navbar->title }}</td>
        <td>{{ $navbar->url }}</td>


        <td>

            <form action="{{ url('navbars/'. $navbar->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <a class="btn btn-info" href="{{ url('navbars/'. $navbar->id) }}">Voir</a>
                <a class="btn btn-primary" href="{{ url('navbars/'. $navbar->id .'/edit') }}">Modifier</a>

                <button type="submit" class="btn btn-danger">Supprimer</button>

            </form>
        </td>

    </tr>

    @endforeach
</table>




@endsection
