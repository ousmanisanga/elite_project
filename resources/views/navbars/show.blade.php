@extends('layouts.app')


@section('content')

<h1>Liste des liens</h1>


<table class="table table-bordered">

    <tr>
        <th>title:</th>
        <td>{{ $navbar->title }}</td>
    </tr>

    <tr>

        <th>url:</th>
        <td>{{ $navbar->url }}</td>

    </tr>



</table>

@endsection
