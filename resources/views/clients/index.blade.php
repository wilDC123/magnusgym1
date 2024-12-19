@extends('adminlte::page')
@section('title', 'Clientes')
@section('content_header')
    <h1>Listado de Clientes</h1>
@stop
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{route('clients.create')}}" class="btn btn-success">Agregar Cliente</a>
    </div>
    <table  id="clients" class="table table-bordered mt-12">
        <thead style="background-color: #343A40;">
            <tr style="color:#83FF6D">
                <th width="30px">ID</th>
                <th>Nombre completo</th>
                <th>Cédula <span style="color: red;">*</span></th>
                <th>Género</th>
                <th>Teléfono <span style="color: red;">*</span></th>
                <th>Email <span style="color: red;">*</span></th>
                <th>Acciones</th>
            </tr>
            
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
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function(){
                    $('#clients').DataTable({
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