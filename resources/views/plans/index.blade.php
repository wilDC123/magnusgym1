@extends('adminlte::page')
@section('title', 'Planes')
@section('content_header')
    <h1>Planes</h1>
@stop
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{route('plans.create')}}" class="btn btn-primary">Agregar Plan</a>
    </div>
    <table id="plans" class="table table-bordered mt-12">
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
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function(){
                    $('#plans').DataTable({
                        "ordering":false,
                        "language":{
                            "search":       "Buscar",
                            "lengthMenu":   "Mostrar _MENU_ registros por pagina",
                            "info": "Mostrando página _PAGE_ de _PAGES_",
                            "paginate":     {
                                                "previus": "Anterior",
                                                "next": "Siguiente",
                                                "first": "Primero",
                                                "last": "Ultimo"
                            }
                        }
                    });
                });
    </script>
@endsection