<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use App\Models\DetalleCarrito;
use App\Models\talla;
use App\Models\User;
use App\Models\Deseo;
use App\Models\Inventario;
use App\Models\Descuento;
use App\Models\Marca;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;

use function PHPUnit\Framework\isNull;

class CarritoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('onlyAdmi');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $carritos = Carrito::all();
        return view('carritos.index', compact('carritos'));
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
        $usuario = $request->id_user;
        $micarrito = Carrito::where('id_user', $usuario)->first();
       
        if(Carrito::where('id_user', $usuario)->exists() == false){
            
            $carrito = new Carrito();
            $carrito->id_user = $request->id_user;
            $carrito->cantidad_productos =0;
            $carrito->total = 0;
            $carrito->save();
            
            $dcar =new  DetalleCarrito();
            $dcar->carrito_id = $carrito->id;
            $id_producto = $request->id_producto;
            
            $dcar->producto_id=$id_producto;
            $dcar->cantidad=$request->cantidad;
            $dcar->precio=0;
            $dcar->importe=0;
            $dcar->save();
        }else{
            $dcar =new  DetalleCarrito();
            $dcar->carrito_id = $micarrito->id;
            $id_producto = $request->id_producto;
            
            $dcar->producto_id=$id_producto;
            $dcar->cantidad=$request->cantidad;
            $dcar->precio=0;
            $dcar->importe=0;
            $dcar->save();
        }
        //$carrito->productos()->attach($carrito->id, ['producto_id'=>$id_producto, 'cantidad'=>$request->cantidad, 'precio'=>0, 'importe'=>0]);
        return redirect()->route('catalogos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $marcas = Marca::all();
        $tallas = talla::all();
        $detalle = DetalleCarrito::all();
        $carrito = Carrito::find($id);
    
        $producto = Producto::all();
        return view('carritos.show', compact('detalle' ,'carrito', 'producto', 'tallas', 'marcas'));
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
        $detalle = DetalleCarrito::where('producto_id', $id);
        $detalle->delete();
        /*$carrito = Carrito::find($id);
        $carrito->delete();*/
        return redirect('/front');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminarDetalle($id)
    {
        $detalle = DetalleCarrito::find($id);
        $detalle->delete();
        return redirect('/front');
    }

}
