<?php

namespace App\Http\Controllers\administrador\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\foto;
class encabezadoController extends Controller
{
    public function index(){
        $fotosPublicadas=foto::where('estatu_id','1')->get();

        return view('administrador.encabezado',compact('fotosPublicadas'));
    }

    public function encabezadoConectar(Request $request){

        $data=$request->all();
        $verificaSeccion=foto::where('seccion_id','1')->get();
        if(count($verificaSeccion)==3){
            $quitarFoto=foto::where('seccion_id','1')->offset(0)->limit(1)->get();
            foreach($quitarFoto as $foto){
                $updateFoto=foto::find($foto->id);
                $updateFoto->seccion_id=null;
                $updateFoto->save();
            }
            $publicadaConecta=foto::find($data['id']);
            $publicadaConecta->seccion_id=1;
            $publicadaConecta->save();
        }else{
            $publicadaConecta=foto::find($data['id']);
            $publicadaConecta->seccion_id=1;
            $publicadaConecta->save();
        }
        return redirect('/admin/cms/secciones/encabezado');         
    }

    public function encabezadoQuitar(Request $request){

        $data=$request->all();
        $fotoQuita=foto::find($data['id']);
        $fotoQuita->seccion_id=null;
        $fotoQuita->save();
        return redirect('/admin/cms/secciones/encabezado');
    }
    
}
