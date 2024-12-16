@extends('adminlte::page')
@section('title', 'Detalle del Horario')
@section('content_header')
    <h1>Detalle del Horario</h1>
@stop
@section('content')
    <div>
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{ $workshift->workshift_name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Hora de Inicio: </strong>{{ $workshift->start_time }}</p>
            <p><strong>Hora de Fin: </strong>{{ $workshift->end_time }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('workshifts.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('workshifts.edit', $workshift->id) }}" class="btn btn-primary">Modificar</a>
            <form action="{{ route('workshifts.destroy', $workshift) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este horario?')">Eliminar</button>
            </form>
        </div>
    </div>
@stop
