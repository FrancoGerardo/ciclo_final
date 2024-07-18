@extends('adminlte::page')

@section('title', 'Quality-Shoes')

@section('content_header')

@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

    <br>
    <div class="card text-dark">
        <div class="card-header  text-center">
            <h3><b>Detalle</b></h3>
        </div>
    </div>

    <div class="card">

        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="carrito">
                <thead class="thead-dark">
                    <tr>
                        <th thead-light class="text-center">Id_Reporte</th>
                        <th thead-light class="text-center">Id_NotaVenta</th>
                        {{-- @can('Modo Admin') --}}
                        <th thead-light class="text-center">Nombre</th>

                        <th thead-light class="text-center">Total</th>

                        {{-- @endcan --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalle as $detalleActual)
                        <tr>
                            @if ($detalleActual->reporte_id == $reporte->id)
                                <td thead-light class="text-center"> {{$detalleActual->reporte_id}}</td>
                                <td thead-light class="text-center"> {{$detalleActual->notaventas_id}}</td>
                                <td thead-light class="text-center"> {{$detalleActual->nombre}}</td>
                                <td thead-light class="text-center"> {{$detalleActual->total}}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <a class="btn btn-danger" href="{{ route('reportes.index') }}"><i class="fas fa-arrow-left"></i> Volver</a>
@stop
