@extends('adminlte::page')

@section('title', 'Detalle del Entrenador')

@section('content_header')
    <h1>Detalle del Entrenador</h1>
@stop

@section('content')
    <div>
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{ $trainer->trainer_name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Teléfono: </strong>{{ $trainer->phone }}</p>
            <p><strong>Correo Electrónico: </strong>{{ $trainer->email }}</p>
            <p><strong>Horario de Trabajo: </strong>{{ $trainer->workshift->workshift_name }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('trainers.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('trainers.edit', $trainer->id) }}" class="btn btn-primary">Modificar</a>
            <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este entrenador?')">Eliminar</button>
            </form>
        </div>
    </div>
@stop
