@extends('layouts.app')

@section('content')

<h1>Lista de Computadores</h1>

<a href="/computers/create">Nuevo computador</a>

<br>
<br>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Número</th>
            <th>Marca</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($computers as $computer)
        <tr>
            <td>{{ $computer->id }}</td>
            <td>{{ $computer->number }}</td>
            <td>{{ $computer->brand }}</td>
            <td>
                <a href="#">Ver más</a>
                <a href="#">Editar</a>
                <a href="#">Eliminar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection