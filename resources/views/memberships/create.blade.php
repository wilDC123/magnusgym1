@extends('adminlte::page')

@section('title', 'Agregar Membresía')

@section('content_header')
    <h1>Agregar datos de la Membresía</h1>
@stop

@section('content')
    <form action="{{ route('memberships.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_client">Cliente:</label>
                    <select id="id_client" name="id_client" class="form-control" required>
                        <option value="">Seleccionar Cliente</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_plan">Plan:</label>
                    <select id="id_plan" name="id_plan" class="form-control" required>
                        <option value="">Seleccionar Plan</option>
                        @foreach($plans as $plan)
                            <option value="{{ $plan->id }}">{{ $plan->plan_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
