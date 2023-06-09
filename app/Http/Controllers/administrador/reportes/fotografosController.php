<?php

namespace App\Http\Controllers\administrador\reportes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\persona;
use App\dat_sexo;
use App\dat_civile;

class fotografosController extends Controller
{
    public function index(Request $request){
       
        $data=$request->all();
        $generos=dat_sexo::all();
        $estatus=dat_civile::all();

       if(empty($data)){

            $fotografos=persona::all();       

            return view('administrador.reportesFotografo',compact('fotografos','generos','estatus'));

        }else{
            
            $fotografos=DB::table('personas');

            if($data['fechaInicial'] <> null && $data['fechafinal'] <> null){
                $fotografos->whereBetween('created_at',[$data['fechaInicial'], $data['fechafinal']]);
            }

            if($data['genero'] <> null && $data['genero'] <> -1){

                $fotografos->where('dat_sexo_id',$data['genero']);
            }

            if($data['estatusCivil'] <> null && $data['estatusCivil'] <> -1){
                
                $fotografos->where('dat_civile_id',$data['estatusCivil']);

            }

            if($data['nombre'] != "" && $data['nombre'] != null){

                $nombre=trim($data['nombre']);

                $fotografos->where('nombre','like','%'.$nombre.'%');
            }
            
            $fotografos=$fotografos->get();            
            
            return view('administrador.reportesFotografo',compact('fotografos','generos','estatus'));
        }
    }
}
