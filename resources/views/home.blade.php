{{-- NOTA KARLA:
    EXTENDS SON DIRECTIVAS DE BLADE --}}
    @extends('adminlte::page')

    @section('title', 'Quality-Store')
    @section('content_header')
    
    
        <h1>
    
            <center>Menu de Inicio</center>
        </h1>
    
    @stop
    
    {{-- NOTA KARLA:
        CONTENT ES EL NOMBRE QUE SE DEFINIO EN --}}
    @section('content') {{-- se especifica a que section se esta haciendo referencia --}}
    
        @can('Gestionar Productos')
            <p>
                <center>Bienvenido al panel de administrador.
                </center>
            <p>
            <div class="card">
               
    
    
               
                <div id="columnchart_material" style="width: 400px; height: 300px;"></div>
            </div>
    
    
    
    
        @endcan
    @stop
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stop
    @section('js')
        <script src="asset('js/app.js')"></script>
        <script src="asset('js/grafica.js')"></script>
    @stop
    