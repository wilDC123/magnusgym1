@extends('adminlte::page')
@section('title', 'Modificar Horario')
@section('content_header')
    <h1>Modificar datos del Horario</h1>
@stop
@section('content')
<form action="{{ route('workshifts.update', $workshift->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="workshift_name">Nombre del horario:</label>
                <input type="text" id="workshift_name" name="workshift_name" class="form-control" value="{{ $workshift->workshift_name }}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="start_time">Hora de inicio:</label>
                <input type="time" id="start_time" name="start_time" class="form-control" value="{{ $workshift->start_time }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="end_time">Hora de fin:</label>
                <input type="time" id="end_time" name="end_time" class="form-control" value="{{ $workshift->end_time }}" required>
            </div>
        </div>
    </div>

    <a href="{{ route('workshifts.index') }}" class="btn btn-secondary">Volver</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@stop