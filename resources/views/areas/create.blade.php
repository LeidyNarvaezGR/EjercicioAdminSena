@extends('layouts.app')

@section('content')

<h1>Areas</h1>

<form action="{{route('areas.store')}}" method="POST" enctype="multipart/form-data">

@csrf

<label>
    Nombre:
    <br>
    <input type="text" name="name">
</label>
<br>



<button type="submit">Crear:</button>
</form>

@endsection