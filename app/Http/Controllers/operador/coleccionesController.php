<?php

namespace App\Http\Controllers\operador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\coleccione;
use App\foto;
class coleccionesController extends Controller
{
    public function index(){

        $colecciones=coleccione::all();        
        return view('operador.colecciones',compact('colecciones'));
    }

    public function listadoFotosColeccion($id){

        $coleccion=coleccione::find($id);
        return view('operador.coleccion',compact('coleccion'));
    }

    public function AgregarFotosColeccion($id){

        $fotos=foto::where('coleccione_id',null)->get();
        return view('administrador.agregarcoleccion',compact('fotos','id'));
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

    public function agregarfotoColeccion(Request $request){

        $foto=foto::find($request->id);
        $foto->coleccione_id=$request->coleccione_id;
        $foto->save();
        return redirect('/operador/agregar/coleccion/'.$request->coleccione_id);
    }

    public function eliminarColeccion(Request $request){

        $coleccion=coleccione::find($request->id);
        foreach($coleccion->fotos as $foto){
            $fotografia=foto::find($foto->id);
            $fotografia->coleccione_id=null;
            $fotografia->save();
        }   
        $coleccion->delete();
        return redirect('operador/colecciones');
    }

    public function eliminarFotoColeccion(Request $request){

        $foto=foto::find($request->id);
        $foto->coleccione_id=null;
        $foto->save();
        return redirect('admin/coleccion/'.$request->coleccione_id);
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
        return redirect('/operador/colecciones');
    }
}
