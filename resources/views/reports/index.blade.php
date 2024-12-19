@extends('adminlte::page')

@section('title', 'Reporte de Pagos')

@section('content_header')
    <h1>Reporte de Clientes y Pagos</h1>
@stop

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total de Clientes</span>
                        <span class="info-box-number">{{ $totalClients }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-dollar-sign"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total de Pagos</span>
                        <span class="info-box-number">${{ number_format($totalPayments, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Gráfico de Pagos</h3>
            </div>
            <div class="card-body">
                <canvas id="paymentsChart" width="100" height="50"></canvas>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labels = @json($labels); 
        const data = @json($data); 

        const ctx = document.getElementById('paymentsChart').getContext('2d');
        const paymentsChart = new Chart(ctx, {
            type: 'line', 
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pagos por fecha',
                    data: data,
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Fecha'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Monto ($)'
                        }
                    }
                }
            }
        });
    </script>
@stop
