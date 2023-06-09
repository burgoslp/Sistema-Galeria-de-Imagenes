<?php

namespace App\Http\Controllers\administrador\graficas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\coleccione;
use App\persona;
class imagenesController extends Controller
{
    public function index(Request $request){

        $data=$request->all();
        $colecciones=coleccione::all();
        $fotografos=persona::all();
        $tipoGrafica='line';
        if(empty($data)){

            
            return view('administrador.graficasImagenes',compact('colecciones','fotografos','tipoGrafica'));

        }else{
            $fotosCant=array();
            if($data['fechaInicial'] <> null && $data['fechafinal'] <> null){

                
                $arrayCantMeses=$this->cantMeses(array($data['fechaInicial'],$data['fechafinal']));               
                foreach($arrayCantMeses as $mes){
                    switch ($mes) {
                        case '01';
                            $fotos=DB::table('fotos');
                            $fotos=DB::table('fotos');
                            $fotos->whereBetween('created_at',['2023-01-01', '2023-01-30']);
                        break;
                        case '02';
                            $fotos=DB::table('fotos');
                            $fotos=DB::table('fotos');
                            $fotos->whereBetween('created_at',['2023-02-01', '2023-02-30']);
                        break;
                        case '03';
                            $fotos=DB::table('fotos');
                            $fotos=DB::table('fotos');
                            $fotos->whereBetween('created_at',['2023-03-01', '2023-03-30']);
                        break;
                        case '04';
                            $fotos=DB::table('fotos');
                            $fotos=DB::table('fotos');
                            $fotos->whereBetween('created_at',['2023-04-01', '2023-04-30']);
                        break;
                        case '05';
                            $fotos=DB::table('fotos');
                            $fotos=DB::table('fotos');
                            $fotos->whereBetween('created_at',['2023-05-01', '2023-05-30']);
                        break;
                        case '06';
                            $fotos=DB::table('fotos');
                            $fotos=DB::table('fotos');
                            $fotos->whereBetween('created_at',['2023-06-01', '2023-06-30']);
                        break;
                        case '07';
                            $fotos=DB::table('fotos');
                            $fotos=DB::table('fotos');
                            $fotos->whereBetween('created_at',['2023-07-01', '2023-07-30']);
                        break;
                        case '08';
                            $fotos=DB::table('fotos');
                            $fotos=DB::table('fotos');
                            $fotos->whereBetween('created_at',['2023-08-01', '2023-08-30']);
                        break;
                        case '09';
                            $fotos=DB::table('fotos');
                            $fotos=DB::table('fotos');
                            $fotos->whereBetween('created_at',['2023-09-01', '2023-09-30']);
                        break;
                        case '10':
                            $fotos=DB::table('fotos');
                            $fotos=DB::table('fotos');
                            $fotos->whereBetween('created_at',['2023-10-01', '2023-10-30']);

                            
                            
                            break;
                        case '11':
                            $fotos=DB::table('fotos');
                            $fotos=DB::table('fotos');
                            $fotos->whereBetween('created_at',['2023-11-01', '2023-11-30']);

                            

                            break;
                        case '12':
                            $fotos=DB::table('fotos');
                            $fotos=DB::table('fotos');
                            $fotos->whereBetween('created_at',['2023-12-01', '2023-12-30']);         

                           

                            break;
                    }
                    if($data['id_estatusPublicado'] <> null && $data['id_estatusPublicado'] <> -1){//criterio publicado
                        $fotos->where('estatu_id',$data['id_estatusPublicado']);
                    }
                    if($data['id_estatusEliminado'] <> null && $data['id_estatusEliminado'] <> -1){//criterio eliminado
                        if($data['id_estatusEliminado'] == 1){
                            $fotos->whereNotNull('deleted_at');
                        }else{
                            $fotos->whereNull('deleted_at');
                        }
                    }
                    if($data['id_estatusEliminado'] <> null && $data['id_estatusEliminado'] <> -1){//criterio eliminado
                        if($data['id_estatusEliminado'] == 1){
                            $fotos->whereNotNull('deleted_at');
                        }else{
                            $fotos->whereNull('deleted_at');
                        }
                    }
                    if($data['id_coleccion'] <> null && $data['id_coleccion'] <> -1){//criterio colección
                        $fotos->where('coleccione_id',$data['id_coleccion']);
                    }        
                    if($data['autor'] <> null && $data['autor'] <> -1){//criterio autor
                       $fotos->where('persona_id',$data['autor']);
                    }
                    if($data['tipoGrafica'] <> null && $data['tipoGrafica'] <> -1){//criterio tipo grafica
                        switch ($data['tipoGrafica']) {
                            case '1':
                                $tipoGrafica='line';
                                break;
                            case '2':
                                $tipoGrafica='bar';
                                break;
                            case '3':
                                $tipoGrafica='doughnut';
                                break;
                        }

                    }
                    $fotos=$fotos->get();
                    array_push($fotosCant,count($fotos));
                }
            }
            $stringfotosCant=implode(",", $fotosCant);
            $stringArrayMeses=implode(',',$this->nomMeses($arrayCantMeses));
           return view('administrador.graficasImagenes',compact('stringfotosCant','stringArrayMeses','colecciones','fotografos','tipoGrafica'));
        }       

    }
    public function cantMeses($a){
        $f1 = new DateTime( $a[0] );
        $f2 = new DateTime( $a[1] );
        $mesInicial=$f1->format('m');
        $mesFinal=$f2->format('m');
        $m=0;
        if($mesInicial!=$mesFinal){
            while($mesInicial!=$mesFinal){
          
                $mesInicial=date("m", mktime(0, 0, 0, $f1->format('m')+$m, 1, $f1->format('Y')));                        
                $meses[$m]=$mesInicial;
                $m++;
            }
        }else{
            $meses[0]=$mesFinal;
        }
        return $meses;
    }

    public function nomMeses($numMeses){
        $m=0;
        $nomMeses=array();
        foreach($numMeses as $mes){
            switch ($mes) {
                case '01':
                    $nomMeses[$m]="Enero";
                    break;
                case '02':
                    $nomMeses[$m]="Febrero";
                    break;
                case '03':
                    $nomMeses[$m]="Marzo";
                    break;
                case '04':
                    $nomMeses[$m]="Abril";
                    break;
                case '05':
                    $nomMeses[$m]="Mayo";
                    break; 
                case '06':
                    $nomMeses[$m]="Junio";
                    break;
                case '07':
                    $nomMeses[$m]="Julio";
                    break;
                case '08':
                    $nomMeses[$m]="Agosto";
                    break;
                case '09':
                    $nomMeses[$m]="Septiembre";
                    break;
                case '10':
                    $nomMeses[$m]="Octubre";
                    break;
                case '11':
                    $nomMeses[$m]="Noviembre";
                    break;
                case '12':
                    $nomMeses[$m]="Diciembre";
                    break;
            }
            $m++;
        }
        return $nomMeses;
    }
}
