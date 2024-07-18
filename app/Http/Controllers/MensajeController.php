<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class MensajeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
    }
    
    public function index()
    {
        $contacto = Contacto::all();
        return view('mensajes.index', compact('contacto'));
    }

}
