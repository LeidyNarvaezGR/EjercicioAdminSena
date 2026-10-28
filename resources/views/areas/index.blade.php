@extends('layouts.app')

@section('content')

<h1>Áreas</h1>

<a href="{{ route('areas.create') }}" class="btn btn-success mb-3">Nueva área</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen (Cloudinary)</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @forelse($areas as $area)
        <tr>
            <td>{{ $area->id }}</td>
            <td>{{ $area->name }}</td>
            <td>
                @if(!empty($area->imagen_url))
                    <a href="{{ $area->imagen_url }}" target="_blank">
                        <img src="{{ $area->imagen_url }}" alt="{{ $area->name }}" width="100" class="img-fluid rounded">
                    </a>
                @else
                    <span class="text-muted">Sin imagen</span>
                @endif
            </td>
            <td>
                <a href="{{ route('areas.edit', $area->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('areas.destroy', $area->id) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Estás seguro de eliminar esta área?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center text-muted">No hay áreas registradas</td>
        </tr>
    @endforelse
    </tbody>
</table>

@endsection
