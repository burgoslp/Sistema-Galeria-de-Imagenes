<?php

namespace App\Http\Controllers\administrador\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\telefono;
class telefonosController extends Controller
{
    public function index(){
        $telefonos=telefono::all();
        return view('administrador.telefonos',compact('telefonos'));
    }

    public function agregarTelefono(Request $request){
        $data=$request->all();
        if($data['estatu_id'] ==1){//activo
            $telefonoActiva=telefono::where('estatu_id','1')->get();
            if(count($telefonoActiva) !=0){
                foreach($telefonoActiva as $activa){
                    $activa=telefono::find($activa->id);
                    $activa->estatu_id=2;
                    $activa->save();
                }
                telefono::create($data);
            }else{  

                telefono::create($data);
            }
        }else{//inactivo

            telefono::create($data);
        }
        return redirect('/admin/cms/institucional/telefonos');
    }

    public function publicarTelefono(Request $request){
        $data=$request->all();
        $telefonoActiva=telefono::where('estatu_id','1')->get();
            if(count($telefonoActiva) !=0){
                foreach($telefonoActiva as $activa){
                    $activa=telefono::find($activa->id);
                    $activa->estatu_id=2;
                    $activa->save();
                }
                $telefono=telefono::find($data['id']);
                $telefono->estatu_id=1;
                $telefono->save();
            }else{  

                $telefono=telefono::find($data['id']);
                $telefono->estatu_id=1;
                $telefono->save();
            }
        return redirect('/admin/cms/institucional/telefonos');
    }

    public function eliminarTelefono(Request $request){
        $data=$request->all();
        $telefono=telefono::find($data['id']);
        $telefono->delete();
        return redirect('/admin/cms/institucional/telefonos');
    }
}
