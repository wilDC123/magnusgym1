@extends('adminlte::page')

@section('title', 'Agregar Entrenador')

@section('content_header')
    <h1>Agregar datos del Entrenador</h1>
@stop

@section('content')
    <form action="{{ route('trainers.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="trainer_name">Nombre del Entrenador:</label>
                    <input type="text" id="trainer_name" name="trainer_name" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Teléfono:</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="id_workshift">Horario de Trabajo:</label>
                    <select id="id_workshift" name="id_workshift" class="form-control" required>
                        <option value="">Seleccionar Horario</option>
                        @foreach($workshifts as $workshift)
                            <option value="{{ $workshift->id }}">{{ $workshift->workshift_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <a href="{{ route('trainers.index') }}" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
