<?php

namespace App\Http\Controllers\administrador\reportes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\categoria;
use App\coleccione;
use App\persona;
class imagenesController extends Controller
{
    public function index(Request $request){//vista no habilitada desde el menu

        $data=$request->all();
        $categorias=categoria::all();
        $colecciones=coleccione::all();
        $fotografos=persona::all();
        if(empty($data)){
            $fotos=DB::table('fotos');
            $fotos->select('personas.nombre','fotos.descripcion','fotos.locacion','fotos.fecha','fotos.url','fotos.updated_at','fotos.deleted_at');
            $fotos->join('personas','personas.id', '=', 'fotos.persona_id');
            $fotos=$fotos->get();
            
            return view('administrador.reportesImagenes',compact('categorias','colecciones','fotografos','fotos'));
        }else {

            $fotos=DB::table('fotos');
            $fotos->select('personas.nombre','fotos.descripcion','fotos.locacion','fotos.fecha','fotos.url','fotos.updated_at','fotos.deleted_at');
            $fotos->join('personas','personas.id', '=', 'fotos.persona_id');
            if($data['fechaInicial'] <> null && $data['fechafinal'] <> null){
                $fotos->whereBetween('fecha',[$data['fechaInicial'], $data['fechafinal']]);
            }

            if($data['id_categoria'] <> null && $data['id_categoria'] <> -1){
                $fotos->where('categoria_id',$data['id_categoria']);
            }

            if($data['id_estatusPublicado'] <> null && $data['id_estatusPublicado'] <> -1){
                $fotos->where('estatu_id',$data['id_estatusPublicado']);
            }

            if($data['id_estatusEliminado'] <> null && $data['id_estatusEliminado'] <> -1){

                if($data['id_estatusEliminado'] == 1){
                  $fotos->whereNotNull('fotos.deleted_at');
                }else{
                  $fotos->whereNull('fotos.deleted_at');
                }
            }

            if($data['id_coleccion'] <> null && $data['id_coleccion'] <> -1){
                $fotos->where('coleccione_id',$data['id_coleccion']);
            }

            if($data['autor'] <> null && $data['autor'] <> -1){
               $fotos->where('persona_id',$data['autor']);
            }

            $fotos=$fotos->get();
            return view('administrador.reportesImagenes',compact('categorias','colecciones','fotografos','fotos'));
        }
       
    }
}
