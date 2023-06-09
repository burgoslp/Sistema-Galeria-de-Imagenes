<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foto;
use App\persona;
use App\coleccione;
use App\categoria;
class operadorcontroller extends Controller
{
    

    public function eliminarFoto(Request $request){

        $idFoto=$request->id;
        $foto=foto::find($idFoto);
        $foto->delete();
        return redirect('/operador');

    }

    public function estatusFoto(Request $request){
        
        $idFoto=$request->id;
        $foto=foto::find($idFoto);
        if($foto->estatu_id==2){
            $foto->estatu_id=1;
        }else{
            $foto->estatu_id=2;
        }
        $foto->save();
        return redirect('/operador');
    }

    

    public function fotosPublicadas(){
        $fotos=foto::where('estatu_id',1)->get();
        return view('operador.publicaciones',compact('fotos'));
    }
    public function crearFotografia(Request $request){

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
        return redirect('/operador');
    }
}
