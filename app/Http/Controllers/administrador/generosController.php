<?php

namespace App\Http\Controllers\administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\dat_sexo;
class generosController extends Controller
{
    public function index(){

        $generos=dat_sexo::all();
        return view('administrador.generos',compact('generos'));
    }
    public function crearGenero(Request $request){
        $data=$request->all();
        dat_sexo::create($data);
        return redirect('admin/generos');
    }
    public function eliminarGeneros(Request $request){

        $dat_sexo=dat_sexo::find($request->id);
        $dat_sexo->delete();
        return redirect('admin/generos');
    }
}
