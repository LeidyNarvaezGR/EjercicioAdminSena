@extends('layouts.app')

@section('content')

<h1>Centros de Formación</h1>

<form action="{{route('TrainingCenter.store')}}" method="POST" enctype="multipart/form-data">

@csrf

<label>
    Nombre:
    <br>
    <input type="text" name="name">
</label>
<br>


<label>
    Ubicacion:
    <br>
    <input type="text" name="location">
</label>
<br>

<br>
<br>

<button type="submit">Subir:</button>
</form>

@endsection