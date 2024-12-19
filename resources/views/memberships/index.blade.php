@extends('adminlte::page')

@section('title', 'Membresías')

@section('content_header')
    <h1>Listado de Membresías</h1>
@stop

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('memberships.create') }}" class="btn btn-primary">Agregar Membresía</a>
    </div>

    <table id="memberships" class="table table-bordered mt-3">
        <thead>
            <tr>
                <th width="30px">ID</th>
                <th>Cliente</th>
                <th>Plan</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($memberships as $membership)
                <tr>
                    <td>{{ $membership->id }}</td>
                    <td>{{ $membership->client->first_name }} {{ $membership->client->last_name }}</td>
                    <td>{{ $membership->plan->plan_name }}</td>
                    <td>
                        <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('memberships.show', $membership->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" style="display: inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta membresía?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
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
                    $('#memberships').DataTable({
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
