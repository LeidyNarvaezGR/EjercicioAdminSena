@extends('layouts.app')

@section('content')

<h1>Editar área</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('areas.update', $area->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $area->name) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Imagen actual:</label><br>
        @if(!empty($area->imagen_url))
            <img src="{{ $area->imagen_url }}" alt="{{ $area->name }}" width="120" class="img-fluid rounded mb-2">
            <a href="{{ $area->imagen_url }}" target="_blank" class="btn btn-outline-info btn-sm">Ver en Cloudinary</a>
        @else
            <span class="text-muted">Sin imagen</span>
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">Nueva imagen </label>
        <input type="file" name="imagen" class="form-control" accept="image/*">
        <div class="form-text">Deja vacío para mantener la imagen actual.</div>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar área</button>
    <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>

</form>

@endsection
