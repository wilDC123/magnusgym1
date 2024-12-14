@extends('adminlte::page')
@section('title', 'Modificar Cliente')
@section('content_header')
    <h1>Modificar datos del Cliente</h1>
@stop
@section('content')
    <form action="{{route('clients.update', $client->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="first_name">Nombres: </label>
                    <input type="text" id="first_name" name="first_name" class="form-control" value="{{$client->first_name}}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="last_name">Apellidos: </label>
                    <input type="text" id="last_name" name="last_name" class="form-control" value="{{$client->last_name}}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ci">Cédula: </label>
                    <input type="text" id="ci" name="ci" class="form-control" value="{{$client->ci}}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="gender">Género: </label>
                    <select name="gender" id="gender" class="form-control" value="{{ $client->gender}}" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="phone">Teléfono: </label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{$client->phone}}" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="email">Correo electrónico: </label>
                    <input type="email" id="email" name="email" class="form-control" value="{{$client->email}}" required>
                </div>
            </div>
        </div>

        <a href="{{route('clients.index')}}" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop