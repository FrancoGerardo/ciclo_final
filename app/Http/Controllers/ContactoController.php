<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ContactoController extends Controller
{
    public function index()
    {  
        return view('contactos.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'correo'=>'required',
            'ubicacion'=>'required',
            'mensaje'=>'required',
        ]);
        
        $contacto = new Contacto();
        $contacto->nombre = $request->input('nombre');
        $contacto->correo = $request->input('correo');
        $contacto->ubicacion = $request->input('ubicacion');
        $contacto->mensaje = $request->input('mensaje');
        $contacto->save();
        //bitacora
        activity()->useLog('gestionar contactos')->log('envio mensaje')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $contacto->id;
        $lastActivity->save();
        return redirect()->route('contactos.index');
    }


    public function edit($id)
    {
        $contacto = Contacto::findOrFail($id);
        //bitacora
        activity()->useLog('gestionar contacto')->log('Edito')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $contacto->id;
        $lastActivity->save();
        return view('mensajes.edit', compact('contacto'));
    }

    public function update(Request $request, Contacto $contacto)
    {
        $contacto->estado = $request->input('estado');
        $contacto->save();
        return redirect()->route('mensajes.index');
    }

    public function destroy($id)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();
        //bitacora
        activity()->useLog('gestionar contacto')->log('Elimino')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $contacto->id;
        $lastActivity->save();
        return redirect()->route('mensajes.index');
    }

}
