<?php

namespace App\Http\Controllers\administrador\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\direccion;
class direccionesController extends Controller
{
    public function index(){
        $direcciones=direccion::all();
        return view('administrador.direcciones',compact('direcciones'));
    }

    public function agregarDireccion(Request $request){
        $data=$request->all();
        if($data['estatu_id'] ==1){//activo
            $direccionActiva=direccion::where('estatu_id','1')->get();
            if(count($direccionActiva) !=0){
                foreach($direccionActiva as $activa){
                    $activa=direccion::find($activa->id);
                    $activa->estatu_id=2;
                    $activa->save();
                }
                direccion::create($data);
            }else{  

                direccion::create($data);
            }
        }else{//inactivo

            direccion::create($data);
        }
        return redirect('/admin/cms/institucional/direcciones');
    }

    public function publicarDireccion(Request $request){
        $data=$request->all();

        $direccionActiva=direccion::where('estatu_id','1')->get();
            if(count($direccionActiva) !=0){
                foreach($direccionActiva as $activa){
                    $activa=direccion::find($activa->id);
                    $activa->estatu_id=2;
                    $activa->save();
                }
                $direccion=direccion::find($data['id']);
                $direccion->estatu_id=1;
                $direccion->save();
            }else{  

                $direccion=direccion::find($data['id']);
                $direccion->estatu_id=1;
                $direccion->save();
            }
        return redirect('/admin/cms/institucional/direcciones');
    }

    public function eliminarDireccion(Request $request){
        $data=$request->all();
        $direccion=direccion::find($data['id']);
        $direccion->delete();
        return redirect('/admin/cms/institucional/direcciones');
    }
}
