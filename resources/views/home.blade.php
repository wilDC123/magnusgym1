@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="content-background">
        <h1 style="color:#83FF6D; font-size: 4rem; text-align: center;">Magnus GYM</h1>
        <h2 style="color:#83FF6D; font-size: 1.5rem; text-align: center;">Hola, {{ Auth::user()->name }}. ¡Bienvenido al panel de administración!</h2>
    </div>
@stop

@section('css')
    <style>
        .content-background {
            background-image: url('/img/fondo/image.png'); 
            background-size: cover; 
            background-position: center; 
            padding: 360px; 
            color: white; 
            border-radius: 8px; 
        }
    </style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
