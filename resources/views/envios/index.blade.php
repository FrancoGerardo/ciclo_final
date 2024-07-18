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
            <h3><b>Envios</b></h3>
        </div>
    </div>

    <div class="card">

        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="envios">
                <thead class="thead-dark">
                    <tr>
                        <th thead-light class="text-center">Id_Notaventa</th>
                        <th thead-light class="text-center">Id_Usuario</th>
                        <th thead-light class="text-center">Nombre</th>
                        {{-- @can('Modo Admin') --}}
                        <th thead-light class="text-center">Direccion</th>
                        <th thead-light class="text-center">Monto</th>
                        {{-- @endcan --}}
                        <th thead-light class="text-center">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($envios as $enviosActual)
                        <tr>
                            <td thead-light class="text-center">{{ $enviosActual->notaVenta_id }}</td>
                            <td thead-light class="text-center">{{ $enviosActual->vendedor_id }}</td>
                            <td thead-light class="text-center">{{ $enviosActual->nombre_vendedor }}</td>
                            <td thead-light class="text-center">{{ $enviosActual->direccion }}</td>
                            <td thead-light class="text-center">{{ $enviosActual->monto }}</td>

                            <td thead-light class="text-center">
                                <form action="{{ route('envio.update', $enviosActual->notaVenta_id) }}" method="GET">
                                    <button class="btn btn-dark" type="submit" href="{{route('envio.index')}}">Enviado</button>
                                    <button class="btn btn-dark" type="submit" href="{{route('envio.index')}}">Entregado</button>
                                    
                                </form>
                            </td>



                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop
