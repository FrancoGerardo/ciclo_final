<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Detallenotaingreso;
use App\Models\Notaingreso;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class NotaingresoController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('onlyAdmi');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::All();
        $notaingresos = Notaingreso::all();
        return view('notaingreso.index', compact('proveedores', 'notaingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notaingreso = New Notaingreso();
        
        $notaingreso->id_proveedor = $request->input('proveedor');
        $nombreProveedor = Proveedor::find($request->input('proveedor'));
        $notaingreso->nombre_proveedor = $nombreProveedor->nombre;
        $notaingreso->fecha = $request->input('fecha');
    
        $notaingreso->save();
        $detalle = Detallenotaingreso::all();
        $productos = Producto::all();
        return redirect()->route('detallenotaingreso.index', compact('notaingreso', 'detalle'));
        //return view('detallenotaingreso.index', compact('notaingreso', 'detalle'));
        //return redirect()->route('detallenotaingreso.index', ['notaingreso'=>$notaingreso, 'detalle'=>$detalle]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $notaingreso = Notaingreso::find($id);
        $detalle = Detallenotaingreso::all();
        return view('notaingreso.show', compact('notaingreso', 'detalle'));
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
        Notaingreso::destroy($id);
        return redirect('notaingresos');
    }

    public function agregarProductos(Request $request, Notaingreso $notaActual){

    }
}
