@extends('adminlte::page')

@section('title', 'Detalle de la Membresía')

@section('content_header')
    <h1>Detalle de la Membresía</h1>
@stop

@section('content')
    <div>
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{ $membership->client->client_name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Cliente: </strong>{{ $membership->client->client_name }}</p>
            <p><strong>Plan: </strong>{{ $membership->plan->plan_name }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-primary">Modificar</a>
            <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta membresía?')">Eliminar</button>
            </form>
        </div>
    </div>
@stop
