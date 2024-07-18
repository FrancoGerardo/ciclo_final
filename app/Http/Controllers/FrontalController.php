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

class FrontalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function carrito_index()
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

    public function notaventa_index(){
        return view('front.ventas.index');
    }
}
