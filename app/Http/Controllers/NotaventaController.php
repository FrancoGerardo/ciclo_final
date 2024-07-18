<?php

namespace App\Http\Controllers;
use App\Models\Notaventa;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Models\Detalleventa;

class NotaventaController extends Controller
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
        $notaventa = Notaventa::all();
        $user = User::all();
        //factura
        return view('notaventas.index', compact('notaventa', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('notaventas.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'monto_total' => 'required|unique:notaventas'
        ]);

        $notaventa = new notaventa();
        $notaventa->monto_total = $request->input('monto_total');
        $notaventa->id_usuario = $request->input('id_usuario');
        $notaventa->save();
        //bitacora
        activity()->useLog('gestionar nota venta')->log('Registro')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $notaventa->id;
        $lastActivity->save();
        return redirect()->route('notaventas.index', $notaventa);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle = Detalleventa::all();
        $notaventa = Notaventa::find($id);
        
        return view('notaventas.show', compact('detalle' ,'notaventa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notaventa = notaventa::findOrFail($id);
        $user = user::all();
        //bitacora
        activity()->useLog('gestionar nota venta')->log('Edito')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $notaventa->id;
        $lastActivity->save();
        return view('notaventas.edit', compact('notaventa', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notaventa $notaventa)
    {
        //$request->validate([
        //    'descripcion' => 'required|unique:notaventas,descripcion,$notaventa->id' ]);/*investigar esta linea */

        //$notaventa=notaventa::findOrFail($id);
        //$notaventa->monto_total=$request->input('monto_total');
        //$notaventa->save();

        $notaventa->update($request->all());
        return redirect()->route('notaventas.index', $notaventa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notaventa = notaventa::findOrFail($id);
        $notaventa->delete();
        //bitacora
        activity()->useLog('gestionar nota venta')->log('Elimino')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $notaventa->id;
        $lastActivity->save();
        return redirect()->route('notaventas.index');
    }
}
