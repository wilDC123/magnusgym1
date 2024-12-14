@extends('adminlte::page')
@section('title', 'Agregar Plan')
@section('content_header')
    <h1>Agregar datos de un Plan</h1>
@stop
@section('content')
    <form action="{{route('plans.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="plan_name">Nombre del Plan: </label>
                    <input type="text" id="plan_name" name="plan_name" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="price">Precio: </label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" min="0" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Descripción: </label>
                    <input type="text" id="description" name="description" class="form-control" required>
                </div>
            </div>
        </div>

        <a href="{{route('plans.index')}}" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop