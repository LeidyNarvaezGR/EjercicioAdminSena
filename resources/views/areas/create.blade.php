@extends('layouts.app')

@section('content')

<h1>Nueva área</h1>

<form action="{{ route('areas.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label class="form-label">Nombre:</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Imagen:</label>
        <input type="file" name="imagen" class="form-control" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Crear área</button>

</form>

@endsection
