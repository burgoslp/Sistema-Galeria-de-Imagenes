<?php

namespace App\Http\Controllers\administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\dat_civile;
class estatusController extends Controller
{
    public function index(){
        $estatus=dat_civile::all();
        return view('administrador.estatus',compact('estatus'));
    }

    public function crearEstatus(Request $request){

        $data=$request->all();
        dat_civile::create($data);
        return redirect('admin/estatus');
    }

    public function eliminarEstatus(Request $request){

        $dat_civile=dat_civile::find($request->id);
        $dat_civile->delete();
        return redirect('admin/estatus');
    }
}
