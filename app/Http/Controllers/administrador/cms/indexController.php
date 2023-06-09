<?php

namespace App\Http\Controllers\administrador\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index(){

        return view('administrador.contenido');
    }
}
