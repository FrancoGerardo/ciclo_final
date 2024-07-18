<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Descuento;
use App\Models\Deseo;
use App\Models\DetalleCarrito;
use App\Models\Inventario;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\talla;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use SebastianBergmann\Environment\Console;
use Spatie\Activitylog\Contracts\Activity;

class FrontController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $deseo = Deseo::all();
        $producto = Producto::all();
        $inventario = Inventario::all();
        $marca = Marca::all();
        $descuento = Descuento::all();
        $talla = talla::all();
        $carrito = Carrito::all();
        $detalleCarrito = DetalleCarrito::all();
        return view('front.carrito_index', compact('user', 'deseo', 'producto', 'inventario', 'marca', 'descuento', 'talla', 'carrito', 'detalleCarrito'));
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
        //
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
}
