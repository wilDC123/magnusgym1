@extends('adminlte::page')
@section('title', 'Clientes')
@section('content_header')
    <h1>Clientes</h1>
@stop
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{route('clients.create')}}" class="btn btn-primary">Agregar Cliente</a>
        <form action="{{ route('clients.index') }}" method="GET" class="form-inline ml-auto">
            <div class="input-group">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Buscar cliente..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-secondary btn-sm" type="submit">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>
            </div>
        </form>
    </div>
    <table class="table table-bordered mt-12">
        <thead>
            <th width="30px">ID</th>
            <th>Nombre completo</th>
            <th>Cédula</th>
            <th>Género</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->first_name . ' ' . $client->last_name}}</td>
                    <td>{{$client->ci}}</td>
                    <td>{{$client->gender}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->email}}</td>
                    <td>
                        <a href="{{route('clients.edit', $client)}}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{route('clients.show', $client)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <form action="{{route('clients.destroy', $client)}}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
