<?php

namespace App\Http\Controllers\administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\foto;

class publicacionesController extends Controller
{
    
    public function index(){

        $fotos=foto::where('estatu_id',1)->get();
        return view('administrador.publicaciones',compact('fotos'));
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
}
