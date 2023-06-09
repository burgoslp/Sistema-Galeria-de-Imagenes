<?php

namespace App\Http\Controllers\operador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\foto;
use App\persona;
use App\coleccione;
use App\categoria;

class indexController extends Controller
{
    public function index(){

        $fotos=foto::all();
        $fotografos=persona::with('foto')->get();
        $colecciones=coleccione::all();
        $categorias=categoria::all();
        return view('operador.index',compact('fotos','fotografos','colecciones','categorias'));
    }
}
