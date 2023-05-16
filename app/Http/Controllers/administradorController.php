<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\foto;
use App\User;
use App\persona;
use App\categoria;
use App\dat_sexo;
use App\dat_civile;
use App\role;
use App\coleccione;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use App\logo;
use App\social;
use App\direccion;
use App\telefono;
class administradorController extends Controller
{
    

    public function index(){
        
        $fotos=foto::all();
        $fotografos=persona::with('foto')->get();
        $colecciones=coleccione::all();
        $categorias=categoria::all();
        
        return view('administrador.index',compact('fotos','fotografos','colecciones','categorias'));
    }

    public function crearFoto(Request $request){

        $data=$request->all();
        if ($imagen=$request->file('file')) {
            $ruta="images/fotografias/";
            $ruta.=$request->persona_id;
            if(!file_exists($ruta)){
                mkdir($ruta);
            }
            
            $nombre_imagen=$imagen->getClientOriginalName();
            $imagen->move($ruta,$nombre_imagen);
            $data['url']=$nombre_imagen;
        }
        
        $data['coleccione_id']=$request->coleccione_id;
        foto::create($data);
        return redirect('/admin');
    }

    public function crearMultiplesFotos(Request $request){
        $fotografias=$request->file('archivo');
        $data=$request->all();
        if($request->coleccione_id=="Seleccione"){
            $data['coleccione_id']=null;
        }
        
        $ruta="images/fotografias/";
        $ruta.=$request->persona_id;
        if(!file_exists($ruta)){
            mkdir($ruta);
        }
        foreach($fotografias as $fotografia){
            $nombre_imagen=$fotografia->getClientOriginalName();
            $fotografia->move($ruta,$nombre_imagen);
            $data['url']=$nombre_imagen;
            foto::create($data);
        }
        return redirect('/admin');
    }

    public function eliminarFoto(Request $request){

        $idFoto=$request->id;
        $foto=foto::find($idFoto);
        $foto->delete();
        return redirect('/admin');

    }

    public function estatusFoto(Request $request){
        
        $idFoto=$request->id;
        $foto=foto::find($idFoto);
        if($foto->estatu_id==2){
            $foto->estatu_id=1;
        }else{
            $foto->estatu_id=2;
        }
        $foto->save();
        return redirect('/admin');
    }


    public function papelera(){

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


    public function fotografos(){
        $fotografos=persona::all();
        $sexos=dat_sexo::all();
        $civiles=dat_civile::all();
        return view('administrador.fotografos',compact('fotografos','civiles','sexos'));
    }

    public function categorias(){

        $categorias=categoria::all();
        return view('administrador.categorias',compact('categorias'));
    }

    public function crearCategoria(Request $request){

        $data=$request->all();
        categoria::create($data);
        return redirect('admin/categorias');
    }

    public function crearFotografo(Request $request){

        $data=$request->all();
        persona::create($data);
        return redirect('admin/fotografos');
    }

    public function generos(){

        $generos=dat_sexo::all();
        return view('administrador.generos',compact('generos'));
    }

    public function crearGenero(Request $request){
        $data=$request->all();
        dat_sexo::create($data);
        return redirect('admin/generos');
    }

    public function estatus(){
        $estatus=dat_civile::all();

        return view('administrador.estatus',compact('estatus'));
    }

    public function crearEstatus(Request $request){

        $data=$request->all();
        dat_civile::create($data);
        return redirect('admin/estatus');
    }

    public function usuarios(){
        
        $usuarios=User::all();
        $roles=role::all();
        return view('administrador.usuarios',compact('usuarios','roles'));
    }

    public function crearUsuarios(Request $request){
        
        $data=$request->all();

        $user= new User;
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->password=bcrypt($data['password']);
        $user->save();
        $user->roles()->attach(Role::where('id',$data['id_role'])->first());
        return redirect('admin/usuarios');
    }

    public function eliminarUsuarios(Request $request){
        
        $user=User::find($request->id);
        $user->delete();
        return redirect('admin/usuarios');
    }  

    public function eliminarEstatus(Request $request){

        $dat_civile=dat_civile::find($request->id);
        $dat_civile->delete();
        return redirect('admin/estatus');
    }

    public function eliminarGeneros(Request $request){

        $dat_sexo=dat_sexo::find($request->id);
        $dat_sexo->delete();
        return redirect('admin/generos');
    }

    public function eliminarCategorias(Request $request){

        $categoria=categoria::find($request->id);
        $categoria->delete();
        return redirect('admin/categorias');

    }

    public function eliminarFotografos(Request $request){
        $fotografo=persona::find($request->id);
        $fotografo->delete();
        return redirect('admin/fotografos');
    }

    public function colecciones(){

        $colecciones=coleccione::all();
        
        return view('administrador.colecciones',compact('colecciones'));
    }

    public function crearColecciones(Request $request){
       
        $data=$request->all();

        $coleccion=new coleccione;
        $coleccion->nombre=$request->nombre;
        $coleccion->descripcion=$request->descripcion;
        $coleccion->fecha=$request->fecha;
        $coleccion->user_id=$request->user_id;
       
        $coleccion->save();
        return redirect('admin/colecciones');
    }

    public function eliminarColecciones(Request $request){

        $coleccion=coleccione::find($request->id);
        foreach($coleccion->fotos as $foto){
            $fotografia=foto::find($foto->id);
            $fotografia->coleccione_id=null;
            $fotografia->save();
        }   
        $coleccion->delete();
        return redirect('admin/colecciones');
    }

    public function verColecciones($id){

        $coleccion=coleccione::find($id);
        return view('administrador.coleccion',compact('coleccion'));
    }

    public function eliminarColeccion(Request $request){

        $foto=foto::find($request->id);
        $foto->coleccione_id=null;
        $foto->save();
        return redirect('admin/coleccion/'.$request->coleccione_id);
    }

    public function agregarColeccion($id){

        $fotos=foto::where('coleccione_id',null)->get();
        return view('administrador.agregarcoleccion',compact('fotos','id'));
    }

    public function agregarfotoColeccion(Request $request){

        $foto=foto::find($request->id);
        $foto->coleccione_id=$request->coleccione_id;
        $foto->save();
        return redirect('/admin/agregar/coleccion/'.$request->coleccione_id);
    }

    public function fotosPublicadas(){

        $fotos=foto::where('estatu_id',1)->get();
        return view('administrador.publicaciones',compact('fotos'));
    }


    public function reportes(){

        $fotos=count(foto::all());
        $fotografos=count(persona::all());
        $publicaciones=count(foto::where('estatu_id',1)->get());
        $eliminadosFotos=0;
        $categorias=count(categoria::all());
        $colecciones=count(coleccione::all());

        return view('administrador.reportes',compact('fotos','fotografos','publicaciones','eliminadosFotos','categorias','colecciones'));
    }

    public function reportesfotografos(Request $request){
       
        $data=$request->all();
        $generos=dat_sexo::all();
        $estatus=dat_civile::all();

       if(empty($data)){

            $fotografos=persona::all();       

            return view('administrador.reportesFotografo',compact('fotografos','generos','estatus'));

        }else{
            
            $fotografos=DB::table('personas');

            if($data['fechaInicial'] <> null && $data['fechafinal'] <> null){
                $fotografos->whereBetween('created_at',[$data['fechaInicial'], $data['fechafinal']]);
            }

            if($data['genero'] <> null && $data['genero'] <> -1){

                $fotografos->where('dat_sexo_id',$data['genero']);
            }

            if($data['estatusCivil'] <> null && $data['estatusCivil'] <> -1){
                
                $fotografos->where('dat_civile_id',$data['estatusCivil']);

            }

            if($data['nombre'] != "" && $data['nombre'] != null){

                $nombre=trim($data['nombre']);

                $fotografos->where('nombre','like','%'.$nombre.'%');
            }
            
            $fotografos=$fotografos->get();            
            
            return view('administrador.reportesFotografo',compact('fotografos','generos','estatus'));
        }
    }

    public function reportesimagenes(Request $request){

        $data=$request->all();
        $categorias=categoria::all();
        $colecciones=coleccione::all();
        $fotografos=persona::all();
        if(empty($data)){
            $fotos=DB::table('fotos');
            $fotos->select('personas.nombre','fotos.descripcion','fotos.locacion','fotos.fecha','fotos.url','fotos.updated_at','fotos.deleted_at');
            $fotos->join('personas','personas.id', '=', 'fotos.persona_id');
            $fotos=$fotos->get();
            
            return view('administrador.reportesImagenes',compact('categorias','colecciones','fotografos','fotos'));
        }else {

            $fotos=DB::table('fotos');
            $fotos->select('personas.nombre','fotos.descripcion','fotos.locacion','fotos.fecha','fotos.url','fotos.updated_at','fotos.deleted_at');
            $fotos->join('personas','personas.id', '=', 'fotos.persona_id');
            if($data['fechaInicial'] <> null && $data['fechafinal'] <> null){
                $fotos->whereBetween('fecha',[$data['fechaInicial'], $data['fechafinal']]);
            }

            if($data['id_categoria'] <> null && $data['id_categoria'] <> -1){
                $fotos->where('categoria_id',$data['id_categoria']);
            }

            if($data['id_estatusPublicado'] <> null && $data['id_estatusPublicado'] <> -1){
                $fotos->where('estatu_id',$data['id_estatusPublicado']);
            }

            if($data['id_estatusEliminado'] <> null && $data['id_estatusEliminado'] <> -1){

                if($data['id_estatusEliminado'] == 1){
                  $fotos->whereNotNull('fotos.deleted_at');
                }else{
                  $fotos->whereNull('fotos.deleted_at');
                }
            }

            if($data['id_coleccion'] <> null && $data['id_coleccion'] <> -1){
                $fotos->where('coleccione_id',$data['id_coleccion']);
            }

            if($data['autor'] <> null && $data['autor'] <> -1){
               $fotos->where('persona_id',$data['autor']);
            }

            $fotos=$fotos->get();
            return view('administrador.reportesImagenes',compact('categorias','colecciones','fotografos','fotos'));
        }
       
    }
    function graficas(){

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

    function graficasImagenes(Request $request){

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
    ///////////////////////////////////////////////////////////////////////////
    //funciones del cms
    public function cmsIndex(){

        return view('administrador.contenido');
    }

    public function Logos(){
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
    public function sociales(){
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

    public function direcciones(){
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

    public function telefonos(){
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

    public function secciones(Request $request){

        return view('administrador.secciones');
    }

    public function encabezado(){
        $fotosPublicadas=foto::where('estatu_id','1')->get();

        return view('administrador.encabezado',compact('fotosPublicadas'));
    }

    public function encabezadoConectar(Request $request){

        $data=$request->all();
        $verificaSeccion=foto::where('seccion_id','1')->get();
        if(count($verificaSeccion)==3){
            $quitarFoto=foto::where('seccion_id','1')->offset(0)->limit(1)->get();
            foreach($quitarFoto as $foto){
                $updateFoto=foto::find($foto->id);
                $updateFoto->seccion_id=null;
                $updateFoto->save();
            }
            $publicadaConecta=foto::find($data['id']);
            $publicadaConecta->seccion_id=1;
            $publicadaConecta->save();
        }else{
            $publicadaConecta=foto::find($data['id']);
            $publicadaConecta->seccion_id=1;
            $publicadaConecta->save();
        }
        return redirect('/admin/cms/secciones/encabezado');         
    }
    public function encabezadoQuitar(Request $request){

        $data=$request->all();
        $fotoQuita=foto::find($data['id']);
        $fotoQuita->seccion_id=null;
        $fotoQuita->save();
        return redirect('/admin/cms/secciones/encabezado');
    }

    public function navegacion(){
        $categorias=categoria::all();
       
       return view('administrador.navegacion',compact('categorias'));
    }

    public function navegacionPublicar(Request $request){
        $data=$request->all();
        $verificacategoria=categoria::where('id',$data['id'])->get();
        foreach($verificacategoria as $categoria){
            $CantFotos=0;
            foreach($categoria->fotos as $foto){
                if($foto->estatu_id == 1){
                    $CantFotos++;
                }                                   
            }
        }

        if($CantFotos < 6){
            return redirect()->back()->with('error', 'Debe tener al menos 6 fotos publicadas para poner visible esta categoría.');
        }else{
            $categoria=categoria::find($data['id']);
            $categoria->estatu_id=1;//activo
            $categoria->save();
            return redirect('/admin/cms/secciones/navegacion');
        }       
    }

    public function navegacionQuitar(Request $request){
        $data=$request->all();
        $data=$request->all();
        $categoria=categoria::find($data['id']);
        $categoria->estatu_id=2;//inactivo
        $categoria->save();

        return redirect('/admin/cms/secciones/navegacion');
    }
}
