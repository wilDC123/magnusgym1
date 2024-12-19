@extends('adminlte::page')

@section('title', 'Registrar Pago')

@section('content_header')
    <h1>Registrar Pago</h1>
@stop

@section('content')
    <form action="{{ route('payments.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_membership">Membresía:</label>
                    <select id="id_membership" name="id_membership" class="form-control" required onchange="updateFields()">
                        <option value="">Seleccionar Membresía</option>
                        @foreach($memberships as $membership)
                            <option value="{{ $membership->id }}" data-client="{{ $membership->client->first_name }} {{ $membership->client->last_name }}" data-amount="{{ $membership->plan->price }}">
                                {{ $membership->client->first_name }} {{ $membership->client->last_name }} - {{ $membership->plan->plan_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="client_name">Cliente:</label>
                    <input type="text" id="client_name" name="client_name" class="form-control" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="amount">Monto:</label>
                    <input type="number" id="amount" name="amount" class="form-control" required readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="payment_date">Fecha de Pago:</label>
                    <input type="date" id="payment_date" name="payment_date" class="form-control" required>
                </div>
            </div>
        </div>

        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <script>
        function updateFields() {
            var membershipSelect = document.getElementById('id_membership');
            var selectedOption = membershipSelect.options[membershipSelect.selectedIndex];
            var clientName = selectedOption.getAttribute('data-client');
            var amount = selectedOption.getAttribute('data-amount');
            document.getElementById('client_name').value = clientName;
            document.getElementById('amount').value = amount;
        }
    </script>
@stop
