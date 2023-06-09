<?php

namespace App\Http\Controllers\administrador\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\social;
class socialesController extends Controller
{
    public function index(){
        $sociales=social::all();

        return view('administrador.sociales',compact('sociales'));
    }
    public function agregarSocial(Request $request){
        $data=$request->all();

        switch ($data['empresa']) {
            case 'Facebook':
                if($data['estatu_id']==1){//activa
                    $socialActiva=social::where('estatu_id','1')->where('empresa','Facebook')->get();
                    if(count($socialActiva)!=0){
                        foreach($socialActiva as $activa){
                            $social=social::find($activa->id);
                            $social->estatu_id=2;
                            $social->save();
                        }
                       
                        social::create($data);

                    }else{
                        social::create($data);
                    }
                }else{//inactiva
                    social::create($data);
                }
                break;
            case 'Linkedin':
                if($data['estatu_id']==1){//activa
                    $socialActiva=social::where('estatu_id','1')->where('empresa','Linkedin')->get();
                    if(count($socialActiva)!=0){
                        foreach($socialActiva as $activa){
                            $social=social::find($activa->id);
                            $social->estatu_id=2;
                            $social->save();
                        }
                       
                        social::create($data);

                    }else{
                        social::create($data);
                    }
                }else{//inactiva
                    social::create($data);
                }
                break;
            case 'Instagram':
                if($data['estatu_id']==1){//activa
                    $socialActiva=social::where('estatu_id','1')->where('empresa','Instagram')->get();
                    if(count($socialActiva)!=0){
                        foreach($socialActiva as $activa){
                            $social=social::find($activa->id);
                            $social->estatu_id=2;
                            $social->save();
                        }
                       
                        social::create($data);

                    }else{
                        social::create($data);
                    }
                }else{//inactiva
                    social::create($data);
                }
                break;
            case 'Twitter':
                if($data['estatu_id']==1){//activa
                    $socialActiva=social::where('estatu_id','1')->where('empresa','Twitter')->get();
                    if(count($socialActiva)!=0){
                        foreach($socialActiva as $activa){
                            $social=social::find($activa->id);
                            $social->estatu_id=2;
                            $social->save();
                        }
                       
                        social::create($data);

                    }else{
                        social::create($data);
                    }
                }else{//inactiva
                    social::create($data);
                }
                break;
        }
        return redirect('/admin/cms/institucional/sociales');
    }
    public function publicarSocial(Request $request){
        $data=$request->all();
        
        switch ($data['empresa']) {
            case 'Facebook':
                $socialActiva=social::where('estatu_id','1')->where('empresa','Facebook')->get();
                if(count($socialActiva) !=0){
                    foreach($socialActiva as $activa){
                        $social=social::find($activa->id);
                        $social->estatu_id=2;
                        $social->save();
                    }
                    $social=social::find($data['id']);
                    $social->estatu_id=1;
                    $social->save();
                }else{
                    $social=social::find($data['id']);
                    $social->estatu_id=1;
                    $social->save();
                }
                break;
            case 'Linkedin':
                $socialActiva=social::where('estatu_id','1')->where('empresa','Linkedin')->get();
                if(count($socialActiva) !=0){
                    foreach($socialActiva as $activa){
                        $social=social::find($activa->id);
                        $social->estatu_id=2;
                        $social->save();
                    }
                    $social=social::find($data['id']);
                    $social->estatu_id=1;
                    $social->save();
                }else{
                    $social=social::find($data['id']);
                    $social->estatu_id=1;
                    $social->save();
                }
                break;
            case 'Instagram':
                $socialActiva=social::where('estatu_id','1')->where('empresa','Instagram')->get();
                if(count($socialActiva) !=0){
                    foreach($socialActiva as $activa){
                        $social=social::find($activa->id);
                        $social->estatu_id=2;
                        $social->save();
                    }
                    $social=social::find($data['id']);
                    $social->estatu_id=1;
                    $social->save();
                }else{
                    $social=social::find($data['id']);
                    $social->estatu_id=1;
                    $social->save();
                }
                break;
            case 'Twitter':
                $socialActiva=social::where('estatu_id','1')->where('empresa','Twitter')->get();
                if(count($socialActiva) !=0){
                    foreach($socialActiva as $activa){
                        $social=social::find($activa->id);
                        $social->estatu_id=2;
                        $social->save();
                    }
                    $social=social::find($data['id']);
                    $social->estatu_id=1;
                    $social->save();
                }else{
                    $social=social::find($data['id']);
                    $social->estatu_id=1;
                    $social->save();
                }
                break;
        }
        return redirect('/admin/cms/institucional/sociales');
    }
    public function eliminarSocial(Request $request){
        $data=$request->all();
        $social=social::find($data['id']);
        $social->delete();
        return redirect('/admin/cms/institucional/sociales');
    }
}
