<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\logo;
use App\social;
use App\direccion;
use App\telefono;
use App\foto;
use App\categoria;
class buscadorController extends Controller
{
    //
    public function index(){
       $logo=logo::where('estatu_id','1')->get();
       $sociales=social::where('estatu_id','1')->get();
       $fotosEncabezado=foto::where('estatu_id',1)->where('seccion_id',1)->get();
       $categorias=categoria::where('estatu_id',1)->get();


       $fotosPublicadas=DB::table('fotos');
       $fotosPublicadas->select('fotos.url','categorias.descripcion','fotos.categoria_id','fotos.persona_id');
       $fotosPublicadas->join('categorias', 'categorias.id', '=', 'fotos.categoria_id');
       $fotosPublicadas->where('categorias.estatu_id',1);
       $fotosPublicadas->where('fotos.estatu_id',1);
       $fotosPublicadas=$fotosPublicadas->get();
     
      return view('buscador',compact('logo','sociales','fotosEncabezado','categorias','fotosPublicadas'));
    }


}
