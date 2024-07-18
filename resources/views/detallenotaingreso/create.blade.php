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

    <form method="post" action="{{ route('detallenotaingreso.store', ['notaingreso_id'=>$notaingreso]) }}">
        @csrf


        
        <!--------------------------------------------------------->
        <!--------------------------------------------------------->
        <div class="form-group col-md-3">
            <h5>Nota de Ingreso Nro:</h5>
            <input type="text" name="notaIngreso"  value="{{$notaingreso->id}}" class="focus border-dark  form-control"  id="notaIngreso" required>
        
        </div>

        <!--------------------------------------------------------->
        <!--------------------------------------------------------->
        <div class="form-group col-md-5">
            <h5>Seleccione el Producto:</h5>
            <select name="producto" class="focus border-dark  form-control">

                @foreach ($productos as $producto)
                    @foreach ($tallas as $talla)
                        @foreach ($marcas as $marca)
                            @if ($producto->id_talla == $talla->id && $producto->id_marca == $marca->id)
                                <option value={{ $producto->id }}>{{ $producto->codigo }} {{ $producto->descripcion }}
                                    {{ $talla->numero }} {{ $marca->nombre }}</option>
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
            </select>
        </div>
        <!--------------------------------------------------------->
        <!--------------------------------------------------------->
        <div class="form-group col-md-3">
            <h5>Precio de Compra:</h5>
            <input type="text" name="precioCompra" class="focus border-dark  form-control" min="1" max="4"
                maxlength="4" size="0" pattern="[0-9]{1,4}" placeholder="Precio" required>
            @error('precio')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--------------------------------------------------------->
        <!--------------------------------------------------------->
        <div class="form-group col-md-3">
            <h5>Precio de Venta:</h5>
            <input type="text" name="precioVenta" class="focus border-dark  form-control" min="1" max="4"
                maxlength="4" size="0" pattern="[0-9]{1,4}" placeholder="Precio" required>
            @error('precio')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--------------------------------------------------------->
        <!--------------------------------------------------------->
        <div class="form-group col-md-3">
            <h5>Cantidad:</h5>
            <input type="text" name="cantidad" class="focus border-dark  form-control" min="1" max="4"
                maxlength="4" size="0" pattern="[0-9]{1,4}"  placeholder="Cantidad" required>
            @error('precio')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
        <!--------------------------------------------------------->
        <!--------------------------------------------------------->
        <button class="btn btn-dark" type="submit">Registrar</button>
        <!-------------------------
            CON EL CODIGO DE ABAJO PODEMOS HACER QUE EL BOTTON REDIRIJA HACIA ATRAS CON EL 
            MISMO ID QUE SE COMENZO 
            -------------------------------->
        <button button onclick="goBack()" class="btn btn-danger" >Volver</button>
        <!--------------------------------------------------------->
        <!---------------------------------
            CODIGO QUE PERMITE QUE AL ACTUALIZAR NO SE REENVIE EL FORMULARIO
        <script>
            history.replaceState(null, null, window.location.pathname)
        </script> 
        ------------------------>

    </form>
    

    <!------------------------------
        CON EL SCRIPT DE ABAJO PODEMOS VOLVER AL MISMO LUGAR ANTERIOR CON EL MISMO ID
        --------------------------->
    <script>
        function goBack() {
          window.history.back();
        }
    </script>
@stop
