@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
    <h1>Listado de Pagos</h1>
@stop

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('payments.create') }}" class="btn btn-primary">Registrar Pago</a>
    </div>

    <table id="payments" class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Plan</th>
                <th>Monto</th>
                <th>Fecha de Pago</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->membership->client->first_name }} {{ $payment->membership->client->last_name }}</td>
                    <td>{{ $payment->membership->plan->plan_name }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td>
                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display: inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este pago?')">
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
                    $('#payments').DataTable({
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