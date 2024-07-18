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
            <h3><b>Notas de Ingreso</b></h3>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{-- @can('Modo Admin') --}}
            <form method="post" action="{{ route('notaingreso.store') }}" >
                @csrf
                <div class="row ">
                    


                    <div class="form-group col-md-5">
                        <label for="proveedor">Seleccione el Proveedor:</label>
                        
                        <select name="proveedor" class="focus border-dark  form-control form-group col-md-20">
                            @foreach ($proveedores as $proveedor)
                                <option value={{ $proveedor->id }}>{{ $proveedor->nombre }} </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col col-lg-6">
                        <label for="fecha">Fecha</label>
                        <input type="date" min="5" max="10" maxlength="10" size="0" pattern="{5,30}"
                             name="fecha"
                            class="focus border-dark  form-control form-group col-md-20" value="" required>

                           
                    </div>

                    
                </div>
                <button class="btn btn-dark form-control"   type="submit">Registrar Nota de Ingreso</button>
                
            </form>



                {{-- Boton imprimir- --}}

                {{-- Imprimir-- --}}
                {{-- @endcan --}}
        </div>

        <div class="card-body table-responsive">
            <div id="printableArea" class="table table-striped table-bordered shadow-lg mt-4">
                <!--AQUI V COMIENZA LA TABLA-->
                <table class="table table-striped table-bordered shadow-lg mt-4" id="usuarios" style="width:100%">
                    <thead class="thead-dark">

                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Proveedor</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Acciones</th>
                        </tr>

                    </thead>
                    <!--CUERPO DE LA TABLA-->
                    <tbody>
                        @foreach ($notaingresos as $notaIngreso)
                            <tr>
                                <td class="text-center">{{ $notaIngreso->id }}</td>
                                <td class="text-center">{{ $notaIngreso->nombre_proveedor }}</td>
                                <td class="text-center">{{ $notaIngreso->fecha }}</td>


                                <td class="text-center">
                                    <form action="{{ route('notaingreso.destroy', $notaIngreso->id) }}" method="POST">

                                        <a class="btn btn-dark btn-sm"
                                            href="{{ route('notaingreso.show', $notaIngreso->id) }}"><i
                                                class="fas fa-eye"></i> Ver</a>

                                        <a class="btn btn-dark btn-sm"
                                            href="{{ route('notaingreso.edit', $notaIngreso->id) }}"><i
                                                class="fas fa-edit"></i> Editar</a>

                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" type="submit"
                                            value="Borrar" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
                                            Eliminar
                                        </button>

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>
    @stop
