<?php

namespace App\Http\Controllers\administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\persona;
use App\dat_sexo;
use App\dat_civile;

class fotografosController extends Controller
{
    public function index(){
        $fotografos=persona::all();
        $sexos=dat_sexo::all();
        $civiles=dat_civile::all();
        return view('administrador.fotografos',compact('fotografos','civiles','sexos'));
    }
    public function crearFotografo(Request $request){

        $data=$request->all();
        persona::create($data);
        return redirect('admin/fotografos');
    }
    public function eliminarFotografos(Request $request){
        $fotografo=persona::find($request->id);
        $fotografo->delete();
        return redirect('admin/fotografos');
    }
}
