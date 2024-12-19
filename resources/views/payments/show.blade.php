@extends('adminlte::page')

@section('title', 'Detalle del Pago')

@section('content_header')
    <h1>Detalle del Pago</h1>
@stop

@section('content')
    <div>
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Pago ID: {{ $payment->id }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Cliente: </strong>{{ $payment->membership->client->first_name }} {{ $payment->membership->client->last_name }}</p>
            <p><strong>Plan: </strong>{{ $payment->membership->plan->plan_name }}</p>
            <p><strong>Monto: </strong>{{ $payment->amount }}</p>
            <p><strong>Fecha de Pago: </strong>{{ $payment->payment_date }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary">Modificar</a>
            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este pago?')">Eliminar</button>
            </form>
        </div>
    </div>
@stop
