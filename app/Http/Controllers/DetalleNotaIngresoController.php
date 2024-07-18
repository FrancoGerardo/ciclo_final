<?php

namespace App\Http\Controllers;
use App\Models\Notaingreso;
use App\Models\Producto;
use App\Models\talla;
use App\Models\Marca;
use App\Models\Detallenotaingreso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetalleNotaIngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Notaingreso
     * @param Detallenotaingreso
     * @return \Illuminate\Http\Response
     */
    public function index(Notaingreso $notaingreso,Detallenotaingreso  $detalle)
    {
        //$notaingreso = Notaingreso::find($id);
        /*if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
        }*/
        /*CON EL CODIGO DE ABAJO CAPTURAMOS EL ID DE LA URL QUE APARECE ARRIBA*/
        $id = $_GET['notaingreso'];
        $notaingreso = Notaingreso::find($id);
        $detalle = Detallenotaingreso::all();
        return view('detallenotaingreso.index', compact('notaingreso', 'detalle'));
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notaingreso  $nota
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$notaingreso = Notaingreso::find($id);
        //$id = $request->input('notaIngreso');
        $id = $_GET['notaingreso_id'];
        //$notaingreso = Notaingreso::find($id);
       
        $productos = Producto::all();
        $tallas = talla::all();
        $marcas = Marca::all();
        $notaingreso = Notaingreso::find($id);
        //$notaingreso = Notaingreso::all();
        return view('detallenotaingreso.create', compact('productos', 'tallas', 'marcas', 'notaingreso'));
        

        //return redirect()->route('detallenotaingreso.create', compact('productos', 'tallas', 'marcas', 'notaingreso'));
        //return view('detallenotaingreso.prueba');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$idnotaingreso = Notaingreso::findOrFail($notaingreso);
        /*
        $detalleIngreso = New Detallenotaingreso();
        $detalleIngreso->notaingreso_id = $request->input('notaIngreso');
        $detalleIngreso->producto_id = $request->input('producto');
        $detalleIngreso->precio_compra = $request->input('precioCompra');
        $detalleIngreso->precio_venta = $request->input('precioVenta');
        $detalleIngreso->cantidad = $request->input('cantidad');
        $detalleIngreso->save();
        return redirect()->route('detallenotaingreso.index');
        */
        
        $id = $_GET['notaingreso_id'];
        $notaingreso = Notaingreso::find($id);
        $precioC = $request->input('precioCompra');
        $precioV = $request->input('precioVenta');
        $cantidad = $request->input('cantidad');
        $producto = $request->input('producto');
        $notaingreso->productos()->attach($producto, ['precio_compra'=>$precioC,'precio_venta'=>$precioV ,'cantidad'=>$cantidad]);
        return redirect()->route('detallenotaingreso.index', compact('notaingreso'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function obternerId(Request $request){
        $id = $request->input('notaIngreso');
        $notaingreso = Notaingreso::find($id);
        return view('detallenotaingreso.prueba');
        //return redirect()->route('detallenotaingreso.create', compact('notaingreso'));
    }
}
