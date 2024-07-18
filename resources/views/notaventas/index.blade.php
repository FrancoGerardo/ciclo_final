@extends('adminlte::page')

@section('title', 'Quality-Store')

@section('content_header')

@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection
@section('js')
    <script src="<?php echo asset('js/imprimir.js'); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@endsection

@section('content')
    <br>
    <div class="card text-dark">
        <div class="card-header  text-center">
            <h3><b>NOTA DE VENTAS</b></h3>
        </div>
    </div>

    <div class="card">
       

                <table class="table table-striped table-bordered shadow-lg mt-4" id="notaventas">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Id_Usuario</th>
                            <th class="text-center">Nombre De Usuario</th>
                            <th class="text-center">Monto total </th>
                            <th class="text-center">Fecha </th>
                            
                            <th thead-light class="text-center">Accion</th>

                            {{-- @can('Modo Admin') --}}
                            <!--<th class="text-center">Acciones</th>-->
                            {{-- @endcan --}}
                        </tr>
                    </thead>
                    <tbody>


                    @foreach($notaventa as $notaventasActual)
                            <tr>
                                <td thead-light class="text-center">{{$notaventasActual->id}}</td>
                                <td thead-light class="text-center">{{$notaventasActual->id_user}}</td>
                                <td thead-light class="text-center">{{$notaventasActual->nombre_usuario}}</td>
                                <td thead-light class="text-center">{{$notaventasActual->monto_total}}</td>
                                <td thead-light class="text-center">{{$notaventasActual->fecha}}</td>
                                
                                <td class="text-center">
                                <form action="{{ route('notaventas.destroy', $notaventasActual) }}" method="POST">
                                    <a class="btn btn-dark btn-sm" href="{{ route('notaventas.show', $notaventasActual) }}"><i
                                            class="fas fa-eye"></i> Ver</a>

                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" type="submit"
                                        value="Borrar" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
                                        Eliminar</button>

                                </form>
                            </td>

                            </tr>
                    @endforeach
                        
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop

@section('js')

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#notaventas').DataTable({
            autoWidth: false
        });
    </script>
@endsection
