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
            <h3><b>Detalle De Venta</b></h3>
        </div>
    </div>

    <div class="card-body table-responsive">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="notaventa">
                <thead class="thead-dark">
                    <tr>
                        <th thead-light class="text-center">Id Nota De Venta</th>
                        <th thead-light class="text-center">Id Producto</th>
                        <th thead-light class="text-center">Descripcion</th>
                        <th thead-light class="text-center">Cantidad</th>
                        <th thead-light class="text-center">Precio</th>
                        <th thead-light class="text-center">Importe</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($detalle as $notaventasActual)

                            <tr>

                            @if ($notaventasActual->id_notaventa == $notaventa->id)
                            
                                <td thead-light class="text-center">{{$notaventasActual->id_notaventa}}</td>
                                <td thead-light class="text-center">{{$notaventasActual->id_producto}}</td>
                                <td thead-light class="text-center">{{$notaventasActual->descripcion}}</td>
                                <td thead-light class="text-center">{{$notaventasActual->cantidad}}</td>
                                <td thead-light class="text-center">{{$notaventasActual->precio}}</td>
                                <td thead-light class="text-center">{{$notaventasActual->importe}}</td>
                                
                             @endif
                            

                            </tr>
                    @endforeach

                </tbody>

@stop