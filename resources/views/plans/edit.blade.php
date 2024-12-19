@extends('adminlte::page')
@section('title', 'Modificar Plan')
@section('content_header')
    <h1>Modificar datos del Plan</h1>
@stop
@section('content')
    <form action="{{ route('plans.update', $plan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="plan_name">Nombre del Plan: </label>
                    <input type="text" id="plan_name" name="plan_name" class="form-control" value="{{ old('plan_name', $plan->plan_name) }}" required>
                    @error('plan_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="price">Precio: </label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $plan->price) }}" step="0.01" min="0" required>
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Descripción: </label>
                    <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description', $plan->description) }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="duracion_dias">Duración en Días: </label>
                    <input type="number" id="duracion_dias" name="duracion_dias" class="form-control" value="{{ old('duracion_dias', $plan->duracion_dias) }}" min="1" required>
                    @error('duracion_dias')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <a href="{{ route('plans.index') }}" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
