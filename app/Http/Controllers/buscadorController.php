<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\logo;
use App\social;
use App\direccion;
use App\telefono;
class buscadorController extends Controller
{
    //
    public function index(){
       $logo=logo::where('estatu_id','1')->get();
       $sociales=social::where('estatu_id','1')->get();
       
        
      return view('buscador',compact('logo','sociales'));
    }


}
