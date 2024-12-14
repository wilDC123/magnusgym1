@extends('adminlte::page')
@section('title', 'Detalle del Cliente')
@section('content_header')
    <h1>Detalle del Cliente</h1>
@stop
@section('content')
    <div >
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{$client->first_name . ' ' . $client->last_name}}</h3>
        </div>
        <div class="card-body">
            <p><strong>Cédula: </strong>{{$client->ci}}</p>
            <p><strong>Género: </strong>{{$client->gender}}</p>
            <p><strong>Teléfono: </strong>{{$client->phone}}</p>
            <p><strong>Correo electrónico: </strong>{{$client->email}}</p>
        </div>
        <div class="card-footer">
            <a href="{{route('clients.index')}}" class="btn btn-secondary">Volver</a>
            <a href="{{route('clients.edit', $client->id)}}" class="btn btn-primary">Modificar</a>
            <form action="{{route('clients.destroy', $client)}}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?')">Eliminar</button>
            </form>
        </div>
    </div>
@stop