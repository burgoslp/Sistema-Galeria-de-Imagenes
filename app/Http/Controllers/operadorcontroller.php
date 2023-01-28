<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foto;
use App\persona;
use App\coleccione;
use App\categoria;
class operadorcontroller extends Controller
{
    public function index(){

        $fotos=foto::all();
        $fotografos=persona::with('foto')->get();
        $colecciones=coleccione::all();
        $categorias=categoria::all();
        return view('operador.index',compact('fotos','fotografos','colecciones','categorias'));
    }

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


    public function colecciones(){

        $colecciones=coleccione::all();
        
        return view('operador.colecciones',compact('colecciones'));
    }

    public function eliminarColecciones(Request $request){

        $coleccion=coleccione::find($request->id);
        foreach($coleccion->fotos as $foto){
            $fotografia=foto::find($foto->id);
            $fotografia->coleccione_id=null;
            $fotografia->save(); 
        }   
        $coleccion->delete();
        return redirect('operador/colecciones');
    }

    public function crearColecciones(Request $request){

        $data=$request->all();

        $coleccion=new coleccione;
        $coleccion->nombre=$request->nombre;
        $coleccion->descripcion=$request->descripcion;
        $coleccion->fecha=$request->fecha;
        $coleccion->user_id=$request->user_id;
        $coleccion->save();
        return redirect('operador/colecciones');
    
    }

    public function verColecciones($id){

        $coleccion=coleccione::find($id);
        return view('operador.coleccion',compact('coleccion'));
    }

    public function agregarColeccion($id){

        $fotos=foto::where('coleccione_id',null)->get();
        return view('operador.agregarcoleccion',compact('fotos','id'));
    }

    public function agregarfotoColeccion(Request $request){

        $foto=foto::find($request->id);
        $foto->coleccione_id=$request->coleccione_id;
        $foto->save();
        return redirect('/operador/agregar/coleccion/'.$request->coleccione_id);
    }

    public function eliminarFotoColecciones(Request $request){

        $foto=foto::find($request->id);
        $foto->coleccione_id=null;
        $foto->save();
        return redirect('operador/coleccion/'.$request->coleccione_id);
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
