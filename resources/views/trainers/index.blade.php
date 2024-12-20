@extends('adminlte::page')

@section('title', 'Entrenadores')

@section('content_header')
    <h1>Listado de Entrenadores</h1>
@stop

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('trainers.create') }}" class="btn btn-success">Agregar Entrenador</a>
    </div>

    <table id="trainers" class="table table-bordered mt-3">
        <thead style="background-color: #343A40;">
            <tr style="color:#83FF6D">
                <th width="30px">ID</th>
                <th>Nombre del Entrenador</th>
                <th>Teléfono <span style="color: red;">*</span></th>
                <th>Correo Electrónico<span style="color: red;">*</span></th>
                <th>Horario de Trabajo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainers as $trainer)
                <tr>
                    <td>{{ $trainer->id }}</td>
                    <td>{{ $trainer->trainer_name }}</td>
                    <td>{{ $trainer->phone }}</td>
                    <td>{{ $trainer->email }}</td>
                    <td>{{ $trainer->workshift->workshift_name }}</td> <!-- Mostramos el nombre del horario relacionado -->
                    <td>
                        <a href="{{ route('trainers.edit', $trainer->id) }}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('trainers.show', $trainer->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST" style="display: inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este entrenador?')">
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
                    $('#trainers').DataTable({
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