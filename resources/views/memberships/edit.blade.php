@extends('adminlte::page')

@section('title', 'Editar Membresía')

@section('content_header')
    <h1>Editar datos de la Membresía</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('memberships.update', $membership->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Selección del cliente -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_client">Cliente:</label>
                    <select id="id_client" name="id_client" class="form-control" required>
                        <option value="">Seleccionar Cliente</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ old('id_client', $membership->id_client) == $client->id ? 'selected' : '' }}>
                                {{ $client->first_name }} {{ $client->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Selección del plan -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_plan">Plan:</label>
                    <select id="id_plan" name="id_plan" class="form-control" required>
                        <option value="">Seleccionar Plan</option>
                        @foreach($plans as $plan)
                            <option value="{{ $plan->id }}" {{ old('id_plan', $membership->id_plan) == $plan->id ? 'selected' : '' }}>
                                {{ $plan->plan_name }} - {{ $plan->duracion_dias }} días
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Fecha de inicio -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio:</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" 
                           value="{{ old('fecha_inicio', $membership->fecha_inicio) }}" required>
                </div>
            </div>

            <!-- Fecha de fin -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin:</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" 
                           value="{{ old('fecha_fin', $membership->fecha_fin) }}">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Días restantes -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dias_restantes">Días Restantes:</label>
                    <input type="number" id="dias_restantes" name="dias_restantes" class="form-control" 
                           value="{{ old('dias_restantes', $membership->dias_restantes) }}" min="0">
                </div>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="row mt-3">
            <div class="col-md-12">
                <a href="{{ route('memberships.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar cambios
                </button>
            </div>
        </div>
    </form>
@stop
