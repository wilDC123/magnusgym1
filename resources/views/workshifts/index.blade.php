@extends('adminlte::page')
@section('title', 'Horarios')
@section('content_header')
    <h1>Horarios de entrenadores</h1>
@stop
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('workshifts.create') }}" class="btn btn-primary">Agregar Horario</a>
    </div>
    <table id="workshifts" class="table table-bordered mt-12">
        <thead>
            <th width="30px">ID</th>
            <th>Nombre del Horario</th>
            <th>Hora de Inicio</th>
            <th>Hora de Fin</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($workshifts as $workshift)
                <tr>
                    <td>{{ $workshift->id }}</td>
                    <td>{{ $workshift->workshift_name }}</td>
                    <td>{{ $workshift->start_time }}</td>
                    <td>{{ $workshift->end_time }}</td>
                    <td>
                        <a href="{{ route('workshifts.edit', $workshift) }}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('workshifts.show', $workshift) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('workshifts.destroy', $workshift) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este horario?')">
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
                    $('#workshifts').DataTable({
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