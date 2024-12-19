@extends('adminlte::page')
@section('title', 'Detalle del Plan')
@section('content_header')
    <h1>Detalle del Plan</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title font-weight-bold">{{ $plan->plan_name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $plan->description }}</p>
            <p><strong>Precio:</strong> {{ number_format($plan->price, 2) }} Bs.</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('plans.index') }}" class="btn btn-secondary" aria-label="Volver a la lista de planes">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
            <div>
                <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-primary" aria-label="Editar el plan">
                    <i class="fas fa-edit"></i> Modificar
                </a>
                <form action="{{ route('plans.destroy', $plan) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este plan?')" aria-label="Eliminar el plan">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
