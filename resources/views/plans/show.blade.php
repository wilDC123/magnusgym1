@extends('adminlte::page')
@section('title', 'Detalle del Plan')
@section('content_header')
    <h1>Detalle del Plan</h1>
@stop
@section('content')
    <div >
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$plan->plan_name}}</h3>
        </div>
        <div class="card-body">
            <p><strong>Descripción: </strong>{{$plan->description}}</p>
            <p><strong>Precio: </strong>{{$plan->price}} Bs.</p>
        </div>
        <div class="card-footer">
            <a href="{{route('plans.index')}}" class="btn btn-secondary">Volver</a>
            <a href="{{route('plans.edit', $plan->id)}}" class="btn btn-primary">Modificar</a>
            <form action="{{route('plans.destroy', $plan)}}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este plan?')">Eliminar</button>
            </form>
        </div>
    </div>
@stop