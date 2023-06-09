<?php

namespace App\Http\Controllers\administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\categoria;
class categoriasController extends Controller
{
    public function index(){

        $categorias=categoria::all();
        return view('administrador.categorias',compact('categorias'));
    }
    public function crearCategoria(Request $request){

        $data=$request->all();
        categoria::create($data);
        print_r($data);
        //return redirect('admin/categorias');
    }
    public function eliminarCategorias(Request $request){

        $categoria=categoria::find($request->id);
        $categoria->delete();
        return redirect('admin/categorias');

    }
}
