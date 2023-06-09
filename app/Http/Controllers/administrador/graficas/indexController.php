<?php

namespace App\Http\Controllers\administrador\graficas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\foto;
class indexController extends Controller
{
    public function index(){

        $mesActual=date("m");
        $mesAnterior=$mesActual-1 < 10 ? '0'.$mesActual-1:$mesActual-1;
        $mesInicial=$mesActual-2 < 10 ? '0'.$mesActual-2:$mesActual-2;
        $trimestre=array();
        $canTrimestre=array();
        switch ($mesActual) {
            case 1:
                $mes3='enero';
                $mes2='diciembre';
                $mes1='noviembre';

                $trimestre=[$mes3, $mes2,$mes1];
                break;
            case 2:
                $mes3='febrero';
                $mes2='enero';
                $mes1='diciembre';

                $trimestre=[$mes3, $mes2,$mes1];
                break;
            case 3:
                $mes3='marzo';
                $mes2='febrero';
                $mes1='enero';
                break;
            case 4:
                $mes3='abril';
                $mes2='marzo';
                $mes1='febrero';
                break;
            case 5:
                $mes3='mayo';
                $mes2='abril';
                $mes1='marzo';
                break;
            case 6:
                $mes3='junio';
                $mes2='mayo';
                $mes1='abril';
                break;
            case 7:
                $mes3='julio';
                $mes2='junio';
                $mes1='mayo';
                break;
            case 8:
                $mes3='agosto';
                $mes2='julio';
                $mes1='junio';
                break;
            case 9:
                $mes3='septiembre';
                $mes2='agosto';
                $mes1='julio';
                break;
            case 10:
                $mes3='octubre';
                $mes2='septiembre';
                $mes1='agosto';
               
                break;
            case 11:
                $mes3='noviembre';
                $mes2='octubre';
                $mes1='septiembre';
                break;
            case 12:
                $mes3='diciembre';
                $mes2='noviembre';
                $mes1='octubre'; 
                break;
        }
        $fotomes3=count(foto::whereBetween('fecha',['2023-'.$mesActual.'-01','2023-'.$mesActual.'-30'])->get());
        $fotomes2=count(foto::whereBetween('fecha',['2023-'.$mesAnterior.'-01','2023-'.$mesAnterior.'-30'])->get());
        $fotomes1=count(foto::whereBetween('fecha',['2023-'.$mesInicial.'-01','2023-'.$mesInicial.'-30'])->get());

        $canTrimestre=[$fotomes3,$fotomes2,$fotomes1];
        $trimestre=[$mes3, $mes2,$mes1];
        return view('administrador.graficas',compact('canTrimestre','trimestre'));
    }
}
