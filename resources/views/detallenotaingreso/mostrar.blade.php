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
            <h3><b>Mostrar</b></h3>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive" >
            <div id="printableArea" class="table table-striped table-bordered shadow-lg mt-4">
                <table class="table table-striped table-bordered shadow-lg mt-4" id="usuarios" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            
                            <th class="text-center">ID_Prodcuto</th>
                            <th class="text-center">Porducto Codigo</th>
                        </tr>
                    </thead>

                    <tbody>
                    
                        @foreach ($detallenotaingreso as $item)
                            <tr>
                                @if($item->notaingreso_id == $idNotaIngreso)
                                    @foreach ($productos as $producto)
                                        @if ($item->producto_id == $producto->id)
                                            <td class="text-center">{{$producto->id}}</td>
                                            <td class="text-center">{{$producto->codigo}}</td>
                                        @endif
                                    @endforeach
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>



    </div>

@stop