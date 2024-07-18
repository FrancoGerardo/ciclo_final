@extends('adminlte::page')

@section('title', 'Quality-Shoes')

@section('content_header')

@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('style/font-awesome.min.css') }}">

@endsection

@section('js')
    <script src="<?php echo asset('js/imprimir.js'); ?>"></script>


    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#productos').DataTable({
            autoWidth: false
        });
    </script>


@endsection


@section('content')
    <br>
    <div class="card text-dark">
        <div class="card-header  text-center">
            <h3><b>DETALLE NOTA DE INGRESO</b></h3>
        </div>
    </div>

    <div class="card-body table-responsive">
        <table class="table" id="marcas">
            <thead class="thead-dark">
                <tr>
                    <th thead-light class="text-center">ID_NotaIngreso </th>
                    <th thead-light class="text-center">ID_Prodcuto</th>
                    <th thead-light class="text-center">Precio_De_Compra</th>
                    <th thead-light class="text-center">Precio_De_Venta</th>
                    <th thead-light class="text-center">Cantidad</th>

                    {{-- @can('Modo Admin') --}}
                    <th thead-light class="text-center">Acciones</th>
                    {{-- @endcan --}}
                </tr>
            </thead>

            <tbody>
                @foreach ($detalle as $detalleActual)
                    @if ($detalleActual->notaingreso_id == $notaingreso->id)
                        <tr>
                            <td class="text-center">{{ $detalleActual->notaingreso_id }}</td>
                            <td class="text-center">{{ $detalleActual->producto_id }}</td>
                            <td class="text-center">{{ $detalleActual->precio_compra }}</td>
                            <td class="text-center">{{ $detalleActual->precio_venta }}</td>
                            <td class="text-center">{{ $detalleActual->cantidad }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

    </div>


@stop
