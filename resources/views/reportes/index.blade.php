@extends('adminlte::page')

@section('title', 'Quality-Store')

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#ventas').DataTable({
            autoWidth: false
        });
    </script>

@endsection


@section('content')
    <br>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="bitacora" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <h4 class="text-center">
                            <b>Reporte de Ventas</b>
                            <h4>
                    </tr>

                    <form method="post" action="{{ route('reportes.store') }}">
                        @csrf
                        <div class="row mt-3">
                            


                            <div class="col col-lg-2">
                                <label for="fecha_inicial">Fecha Inicial</label>
                                <input type="date" min="5" max="10" maxlength="10" size="0"
                                    pattern="{5,30}" name="fecha_inicial"
                                    class="focus border-dark  form-control form-group col-md-20" value="" required>
                            </div>


                            <div class="col col-lg-2">
                                <label for="fecha_final">Fecha Final</label>
                                <input type="date" min="5" max="10" maxlength="10" size="0"
                                    pattern="{5,30}" name="fecha_final"
                                    class="focus border-dark  form-control form-group col-md-20" value="" required>
                            </div>

                            <div class="col col-lg-10">
                                    <button class="btn btn-dark" type="submit">Generar Reporte</button>
                            </div>

                        </div>

                    </form>

                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>



    <div class="card">
        {{-- -Boton Imprimir --}}

        {{-- -Boton imprimir --}}
        <!--
                            <form class="form-inline" method="post" name="formFechas" id="formFechas">
                                <div class="col-xs-10 col-xs-offset-3">
                                    <div class="form-group">
                                        <label for="fecha_inicio">Fecha Inicio:</label>
                                        <input type="date" class="form-control" name="fecha_inicio" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_final">Fecha Final:</label>
                                        <input type="date" class="form-control" name="fecha_final" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        -->
        <div class="card-body table-responsive">
            {{-- Imprimir js --}}
            
                {{-- -imprimir- --}}
                <table class="table table-striped table-bordered shadow-lg mt-4" id="ventas">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Fecha Inicial</th>
                            <th class="text-center">Fecha Final</th>
                            <th thead-light class="text-center"> Accion </th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reportes as $reporteActual)
                            <tr>
                                <td thead-light class="text-center">{{$reporteActual->id}}</td>
                                <td thead-light class="text-center">{{$reporteActual->fecha_inicial}}</td>
                                <td thead-light class="text-center">{{$reporteActual->fecha_final}}</td>
                                <td thead-light class="text-center">
                                    <a class="btn btn-dark btn-sm" href="{{ route('reportes.show', $reporteActual) }}"><i
                                        class="fas fa-eye"></i> Ver</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            
        </div>
    </div>
@stop

@section('js')

    {{-- --fecha--- --}}
    <!--
            <script type="text/javascript">
                $('Formfechas').submit(function(e) {

                    e.preventDefault();
                    var form = $($this);
                    var url = form.attr('action');

                    $.ajax({
                        type: "POST",
                        url: 'fechas.php',
                        data: form.serialize(),
                        success: function(data) {
                            $('#tabla_resultado').html('');
                            $('#tabla_resultado').append(data);
                        }
                    });
                });
            </script>
        -->
    {{-- fecha --}}

@endsection
