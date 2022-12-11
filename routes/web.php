<?php
use App\categoria;
use App\coleccione;
use App\dat_civile;
use App\dat_sexo;
use App\estatu;
use App\foto;
use App\metadata;
use App\persona;
use App\role;
use App\user;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//rutas del buscador
Route::get('/', function () {
    

    return view('buscador');

});

Route::get('/home', function () {
    

    return view('buscador');

});


//rutas del operador
Route::get('/operador','operadorController@index')->middleware('auth','role:operador')->name('index');
Route::get('/operador/colecciones','operadorController@colecciones')->middleware('auth','role:operador');
Route::get('/operador/coleccion/{id}','operadorController@verColecciones')->middleware('auth','role:operador');
Route::get('/operador/agregar/coleccion/{id}','operadorController@agregarColeccion')->middleware('auth','role:operador');
Route::get('/operador/publicado','operadorController@fotosPublicadas')->middleware('auth','role:operador');

Route::post('/operador/colecciones','operadorController@crearColecciones')->middleware('auth','role:operador');
Route::post('/operador/fotografia','operadorController@crearFotografia')->middleware('auth','role:operador');

Route::delete('/operador/fotografia/eliminar', 'operadorController@eliminarFoto')->middleware('auth','role:operador');
Route::delete('/operador/colecciones', 'operadorController@eliminarColecciones')->middleware('auth','role:operador');

Route::put('/operador/fotografia/publicar', 'operadorController@estatusFoto')->middleware('auth','role:operador');
Route::put('/operador/agregar/coleccion','operadorController@agregarfotoColeccion')->middleware('auth','role:operador');
Route::put('/operador/coleccion','operadorController@eliminarFotoColecciones')->middleware('auth','role:operador');

//rutas del administrador
Route::get('/admin', 'administradorController@index')->middleware('auth','role:admin')->name('index');
Route::get('/admin/fotografos', 'administradorController@fotografos')->middleware('auth','role:admin');
Route::get('admin/categorias', 'administradorController@categorias')->middleware('auth','role:admin');
Route::get('/admin/papelera','administradorController@papelera')->middleware('auth','role:admin')->name('papelera');
Route::get('/admin/generos','administradorController@generos')->middleware('auth','role:admin');
Route::get('/admin/estatus','administradorController@estatus')->middleware('auth','role:admin');
Route::get('/admin/usuarios','administradorController@usuarios')->middleware('auth','role:admin');
Route::get('/admin/colecciones','administradorController@colecciones')->middleware('auth','role:admin');
Route::get('/admin/coleccion/{id}','administradorController@verColecciones')->middleware('auth','role:admin');
Route::get('/admin/agregar/coleccion/{id}','administradorController@agregarColeccion')->middleware('auth','role:admin');
Route::get('/admin/publicado','administradorController@fotosPublicadas')->middleware('auth','role:admin');
Route::get('/admin/contenido','administradorController@contenido')->middleware('auth','role:admin');


Route::get('/admin/reportes','administradorController@reportes')->middleware('auth','role:admin')->name('reportes');
Route::get('/admin/reportes/fotografos','administradorController@reportesfotografos')->middleware('auth','role:admin')->name('reportesFotografos');
Route::get('/admin/reportes/imagenes','administradorController@reportesimagenes')->middleware('auth','role:admin')->name('reportesImagenes');
Route::get('/admin/graficas','administradorController@graficas')->middleware('auth','role:admin')->name('graficas');
Route::get('/admin/graficas/imagenes','administradorController@graficasImagenes')->middleware('auth','role:admin')->name('graficasImagenes');


Route::post('/admin/usuarios', 'administradorController@crearUsuarios')->middleware('auth','role:admin');
Route::post('/admin/fotografia/publicar', 'administradorController@estatusFoto')->middleware('auth','role:admin');
Route::post('/admin/fotografia', 'administradorController@crearFoto')->middleware('auth','role:admin');
Route::post('/admin/fotografiaMultiples', 'administradorController@crearMultiplesFotos')->middleware('auth','role:admin');
Route::post('/admin/fotografo', 'administradorController@crearFotografo')->middleware('auth','role:admin');
Route::post('/admin/categoria', 'administradorController@crearCategoria')->middleware('auth','role:admin');
Route::post('/admin/estatus','administradorController@crearEstatus')->middleware('auth','role:admin');
Route::post('/admin/genero', 'administradorController@crearGenero')->middleware('auth','role:admin');
Route::post('/admin/fotografia/eliminar', 'administradorController@eliminarFoto')->middleware('auth','role:admin');
Route::post('/admin/fotografia/vaciar', 'administradorController@vaciarFotos')->middleware('auth','role:admin');
Route::post('/admin/fotografia/restaurar', 'administradorController@restaurarFoto')->middleware('auth','role:admin');
Route::post('/admin/colecciones', 'administradorController@crearColecciones')->middleware('auth','role:admin');

Route::delete('/admin/fotografos', 'administradorController@eliminarFotografos')->middleware('auth','role:admin');
Route::delete('/admin/usuarios', 'administradorController@eliminarUsuarios')->middleware('auth','role:admin');
Route::delete('/admin/estatus', 'administradorController@eliminarEstatus')->middleware('auth','role:admin');
Route::delete('/admin/generos', 'administradorController@eliminarGeneros')->middleware('auth','role:admin');
Route::delete('/admin/categorias', 'administradorController@eliminarCategorias')->middleware('auth','role:admin');
Route::delete('/admin/colecciones', 'administradorController@eliminarColecciones')->middleware('auth','role:admin');

Route::put('/admin/coleccion', 'administradorController@eliminarColeccion')->middleware('auth','role:admin');
Route::put('/admin/agregar/coleccion','administradorController@agregarfotoColeccion')->middleware('auth','role:admin');

//rutas del login
Auth::routes(["register" => false]);
