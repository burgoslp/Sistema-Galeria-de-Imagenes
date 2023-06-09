<?php

namespace App\Http\Controllers\administrador\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\categoria;
class navegacionController extends Controller
{
    public function index(){
        $categorias=categoria::all();
       
       return view('administrador.navegacion',compact('categorias'));
    }
    public function navegacionPublicar(Request $request){
        $data=$request->all();
        $verificacategoria=categoria::where('id',$data['id'])->get();
        foreach($verificacategoria as $categoria){
            $CantFotos=0;
            foreach($categoria->fotos as $foto){
                if($foto->estatu_id == 1){
                    $CantFotos++;
                }                                   
            }
        }

        if($CantFotos < 6){
            return redirect()->back()->with('error', 'Debe tener al menos 6 fotos publicadas para poner visible esta categoría.');
        }else{
            $categoria=categoria::find($data['id']);
            $categoria->estatu_id=1;//activo
            $categoria->save();
            return redirect('/admin/cms/secciones/navegacion');
        }       
    }
    public function navegacionQuitar(Request $request){
        $data=$request->all();
        $data=$request->all();
        $categoria=categoria::find($data['id']);
        $categoria->estatu_id=2;//inactivo
        $categoria->save();

        return redirect('/admin/cms/secciones/navegacion');
    }
}
