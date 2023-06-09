<?php

namespace App\Http\Controllers\administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\foto;
use App\persona;
class papeleraController extends Controller
{
    public function index(){

        $fotos=foto::onlyTrashed()->get();
        $fotografos=persona::all();
        return view('administrador.papelera',compact('fotos'));
    }

    public function restaurarFoto(Request $request){

        $foto=foto::withTrashed()->where('id',$request->id)->restore();
       return redirect('/admin/papelera');
    }
    public function vaciarFotos(Request $request){

        
        $fotos=foto::onlyTrashed()->forceDelete();
        return redirect('/admin/papelera');
    }
}
