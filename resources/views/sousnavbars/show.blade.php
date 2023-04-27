@extends('layouts.app')


@section('content')

<h1>Liste des liens</h1>


<table class="table table-bordered">

    <tr>
        <th>title:</th>
        <td>{{ $sousnavbar->title }}</td>
    </tr>

    <tr>

        <th>url:</th>
        <td>{{ $sousnavbar->url }}</td>

    </tr>



</table>

@endsection
