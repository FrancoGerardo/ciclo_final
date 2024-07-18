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
                        <th thead-light class="text-center">Id_Carrito</th>
                        <th thead-light class="text-center">Descripcion</th>
                        {{-- @can('Modo Admin') --}}
                        <th thead-light class="text-center">Cantidad</th>

                        <th thead-light class="text-center">Precio</th>
                        <th thead-light class="text-center">Importe</th>
                        {{-- @endcan --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalle as $carritoActual)
                        <tr>
                            @if ($carritoActual->carrito_id == $carrito->id)
                                <td thead-light class="text-center">{{ $carritoActual->carrito_id }}</td>
                                @foreach ($producto as $productoActual)
                                    @if ($productoActual->id == $carritoActual->producto_id)
                                        @foreach ($tallas as $talla)
                                            @if ($talla->id == $productoActual->id_talla)
                                                @foreach ($marcas as $marca)
                                                    @if ($marca->id == $productoActual->id_marca)
                                                        <td thead-light class="text-center">
                                                            {{ $productoActual->descripcion }}
                                                            color
                                                            {{ $productoActual->color }}
                                                            marca {{ $marca->nombre }}
                                                            talla {{ $talla->numero }}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                <td thead-light class="text-center">{{ $carritoActual->cantidad }}</td>
                                <td thead-light class="text-center">{{ $carritoActual->precio }}</td>
                                <td thead-light class="text-center"> {{ $carritoActual->importe }}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       
    </div>
    <a class="btn btn-danger" href="{{ route('carritos.index') }}"><i class="fas fa-arrow-left"></i> Volver</a>
@stop
