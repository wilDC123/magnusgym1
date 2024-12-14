@extends('adminlte::page')
@section('title', 'Planes')
@section('content_header')
    <h1>Planes</h1>
@stop
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{route('plans.create')}}" class="btn btn-primary">Agregar Plan</a>
    </div>
    <table class="table table-bordered mt-12">
        <thead>
            <th width="30px">ID</th>
            <th>Nombre del Plan</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($plans as $plan)
                <tr>
                    <td>{{$plan->id}}</td>
                    <td>{{$plan->plan_name}}</td>
                    <td>{{$plan->description}}</td>
                    <td>{{$plan->price}}</td>
                    <td>
                        <a href="{{route('plans.edit', $plan)}}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{route('plans.show', $plan)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <form action="{{route('plans.destroy', $plan)}}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este plan?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
