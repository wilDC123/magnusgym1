@extends('adminlte::page')

@section('title', 'Detalle de la Membresía')

@section('content_header')
    <h1>Detalle de la Membresía</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Detalle de {{ $membership->client->first_name }} {{ $membership->client->last_name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Cliente: </strong>{{ $membership->client->first_name }} {{ $membership->client->last_name }}</p>
            <p><strong>Plan: </strong>{{ $membership->plan->plan_name }}</p>
            <p><strong>Fecha de Inicio: </strong>{{ $membership->fecha_inicio }}</p>
            <p><strong>Fecha de Fin: </strong>{{ $membership->fecha_fin }}</p>
            <p><strong>Días Restantes: </strong>{{ $membership->dias_restantes }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <div>
                <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Volver</a>
                <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-primary">Modificar</a>
            </div>
            <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta membresía?')">Eliminar</button>
            </form>
        </div>
    </div>
@stop
