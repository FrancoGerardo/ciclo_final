<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VistasController extends Controller
{
    
    public function index1(){
        return view('vistas.vista1');
    }

    public function index2(){
        return view('vistas.vista2');
    }
}
