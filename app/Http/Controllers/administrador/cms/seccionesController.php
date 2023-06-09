<?php

namespace App\Http\Controllers\administrador\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class seccionesController extends Controller
{
    public function index(Request $request){

        return view('administrador.secciones');
    }
}
