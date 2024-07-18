<?php

namespace App\Http\Controllers;

use App\Models\Descuento;
use App\Models\Detalleventa;
use App\Models\Marca;
use App\Models\Notaventa;
use App\Models\Producto;
use App\Models\talla;
use App\Models\User;
use App\Models\Reporte;
use App\Models\DetalleReporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function index()
    {
        $reportes = Reporte::all();
        return view('reportes.index', compact('reportes'));
    }

    public function show($id)
    {
        $reporte  = Reporte::find($id);
        $detalle = DetalleReporte::all();
        return view('reportes.show', compact('detalle', 'reporte'));
    }


    public function store(Request $request){
        $reporte = new Reporte();
        $reporte->fecha_inicial = $request->input('fecha_inicial');
        $reporte->fecha_final = $request->input('fecha_final');
        $reporte->save();
        $detalleReportes = DetalleReporte::all();
        return redirect()->route('reportes.index');
    }
}
