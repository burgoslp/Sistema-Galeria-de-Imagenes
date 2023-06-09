<?php

namespace App\Http\Controllers\administrador\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\logo;
class logosController extends Controller
{
    public function index(){
        $logos=logo::all();
        return view('administrador.logos',compact('logos'));
    }
    public function agregarLogo(Request $request){
       
        $data=$request->all();

       if($data['estatu_id']==1){
            $logos=logo::where('estatu_id','1')->get();
            if(count($logos)==0){
                if ($imagen=$request->file('file')) {
                    $ruta="images/cms/logos";
                    if(!file_exists($ruta)){
                        mkdir($ruta);
                    }
                    $nombre_imagen=$imagen->getClientOriginalName();
                    $imagen->move($ruta,$nombre_imagen);
                    $data['url']=$nombre_imagen;
                }
                logo::create($data);
            }else{
                foreach($logos as $logo){
                    $logoActivo=logo::find($logo->id);
                    $logoActivo->estatu_id=2;
                    $logoActivo->save();
                }
                if ($imagen=$request->file('file')) {
                    $ruta="images/cms/logos";
                    if(!file_exists($ruta)){
                        mkdir($ruta);
                    }
                    $nombre_imagen=$imagen->getClientOriginalName();
                    $imagen->move($ruta,$nombre_imagen);
                    $data['url']=$nombre_imagen;
                }
                logo::create($data);
            }
       }else{
            if ($imagen=$request->file('file')) {
                $ruta="images/cms/logos";
                if(!file_exists($ruta)){
                    mkdir($ruta);
                }
                $nombre_imagen=$imagen->getClientOriginalName();
                $imagen->move($ruta,$nombre_imagen);
                $data['url']=$nombre_imagen;
            }
            logo::create($data);
       }
        return redirect('/admin/cms/institucional/logos');
    }
    public function publicarLogo(Request $request){
        
        $data=$request->all();
        $logoActivo=logo::where('estatu_id','1')->get();
        $countLogoActivo=count($logoActivo);

        if($countLogoActivo !=0){
            foreach($logoActivo as $logo){
                $logoActivo=logo::find($logo->id);
                $logoActivo->estatu_id=2;
                $logoActivo->save();
            }
            
            $logo=logo::find($data['id']);
            $logo->estatu_id=1;
            $logo->save();
        }else{
            $logo=logo::find($data['id']);
            $logo->estatu_id=1;
            $logo->save();
        }
        return redirect('/admin/cms/institucional/logos');
    }
}
