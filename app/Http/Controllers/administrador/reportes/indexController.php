<?php

namespace App\Http\Controllers\administrador\reportes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\foto;
use App\persona;
use App\categoria;
use App\coleccione;

class indexController extends Controller
{
    public function index(){

        $fotos=count(foto::all());
        $fotografos=count(persona::all());
        $publicaciones=count(foto::where('estatu_id',1)->get());
        $eliminadosFotos=0;
        $categorias=count(categoria::all());
        $colecciones=count(coleccione::all());

        return view('administrador.reportes',compact('fotos','fotografos','publicaciones','eliminadosFotos','categorias','colecciones'));
    }
}
