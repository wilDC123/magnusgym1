@extends('adminlte::page')

@section('title', 'Entrenadores')

@section('content_header')
    <h1>Listado de Entrenadores</h1>
@stop

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('trainers.create') }}" class="btn btn-primary">Agregar Entrenador</a>
    </div>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th width="30px">ID</th>
                <th>Nombre del Entrenador</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Horario de Trabajo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainers as $trainer)
                <tr>
                    <td>{{ $trainer->id }}</td>
                    <td>{{ $trainer->trainer_name }}</td>
                    <td>{{ $trainer->phone }}</td>
                    <td>{{ $trainer->email }}</td>
                    <td>{{ $trainer->workshift->workshift_name }}</td> <!-- Mostramos el nombre del horario relacionado -->
                    <td>
                        <a href="{{ route('trainers.show', $trainer->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a>
                        <a href="{{ route('trainers.edit', $trainer->id) }}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i> Editar</a>
                        <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST" style="display: inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este entrenador?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
