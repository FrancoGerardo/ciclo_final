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
            <h3><b>Carritos</b></h3>
        </div>
    </div>

    <div class="card">
       
        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="carrito">
                <thead class="thead-dark">
                    <tr>
                        <th thead-light class="text-center">Id </th>
                        <th thead-light class="text-center">Id_Usuario</th>
                        <th thead-light class="text-center">Cantidad</th>
                        {{-- @can('Modo Admin') --}}
                        <th thead-light class="text-center">Total</th>
                        <th thead-light class="text-center">Accion</th>
                        {{-- @endcan --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carritos as $carritoActual)
                        <tr>
                            <td thead-light class="text-center">{{$carritoActual->id}}</td>
                            <td thead-light class="text-center">{{$carritoActual->id_user}}</td>
                            <td thead-light class="text-center">{{$carritoActual->cantidad_productos}}</td>
                            <td thead-light class="text-center">{{$carritoActual->total}}</td>
                            <td thead-light class="text-center"><a class="btn btn-dark btn-sm" href="{{ route('carritos.show', $carritoActual) }}"><i
                                class="fas fa-eye"></i> Ver</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop