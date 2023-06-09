<?php

namespace App\Http\Controllers\administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\foto;
use  App\persona;
use  App\categoria;
use  App\coleccione;

class indexController extends Controller
{
    public function index(){
        
        $fotos=foto::all();
        $fotografos=persona::with('foto')->get();
        $colecciones=coleccione::all();
        $categorias=categoria::all();
        
        return view('administrador.index',compact('fotos','fotografos','colecciones','categorias'));
    }
    public function crearFoto(Request $request){

        $data=$request->all();
        if ($imagen=$request->file('file')) {
            $ruta="images/fotografias/";
            $ruta.=$request->persona_id;
            if(!file_exists($ruta)){
                mkdir($ruta);
            }
            
            $nombre_imagen=$imagen->getClientOriginalName();
            $imagen->move($ruta,$nombre_imagen);
            $data['url']=$nombre_imagen;
        }
        
        $data['coleccione_id']=$request->coleccione_id;
        foto::create($data);
        return redirect('/admin');
    }
    public function crearMultiplesFotos(Request $request){
        $fotografias=$request->file('archivo');
        $data=$request->all();
        if($request->coleccione_id=="Seleccione"){
            $data['coleccione_id']=null;
        }
        
        $ruta="images/fotografias/";
        $ruta.=$request->persona_id;
        if(!file_exists($ruta)){
            mkdir($ruta);
        }
        foreach($fotografias as $fotografia){
            $nombre_imagen=$fotografia->getClientOriginalName();
            $fotografia->move($ruta,$nombre_imagen);
            $data['url']=$nombre_imagen;
            foto::create($data);
        }
        return redirect('/admin');
    }

    public function modificaEstatusFoto(Request $request){
        
        $idFoto=$request->id;
        $foto=foto::find($idFoto);
        if($foto->estatu_id==2){
            $foto->estatu_id=1;
        }else{
            $foto->estatu_id=2;
        }
        $foto->save();
        return redirect('/admin');
    }

    public function eliminarFoto(Request $request){

        $idFoto=$request->id;
        $foto=foto::find($idFoto);
        $foto->delete();
        return redirect('/admin');

    }
}
