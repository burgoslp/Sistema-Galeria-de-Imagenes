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
Route::get('/','buscadorController@index');
Route::get('/home','buscadorController@index');


//rutas del operador
Route::get('/operador','operador\indexController@index')->middleware('auth','role:operador')->name('index');
Route::get('/operador/colecciones','operador\coleccionesController@index')->middleware('auth','role:operador');
Route::get('/operador/coleccion/{id}','operador\coleccionesController@listadoFotosColeccion')->middleware('auth','role:operador');
Route::get('/operador/agregar/coleccion/{id}','operador\coleccionesController@AgregarFotosColeccion')->middleware('auth','role:operador');

Route::get('/operador/publicado','operadorController@fotosPublicadas')->middleware('auth','role:operador');

Route::post('/operador/colecciones','operador\coleccionesController@crearColecciones')->middleware('auth','role:operador');
Route::post('/operador/fotografia','operadorController@crearFotografia')->middleware('auth','role:operador');

Route::delete('/operador/fotografia/eliminar', 'operadorController@eliminarFoto')->middleware('auth','role:operador');
Route::delete('/operador/colecciones', 'operador\coleccionesController@eliminarColeccion')->middleware('auth','role:operador');

Route::put('/operador/fotografia/publicar', 'operadorController@estatusFoto')->middleware('auth','role:operador');
Route::put('/operador/agregar/coleccion','operador\coleccionesController@agregarfotoColeccion')->middleware('auth','role:operador');
Route::put('/operador/coleccion','operador\coleccionesController@eliminarFotoColeccion')->middleware('auth','role:operador');

//rutas del administrador
//parametros
Route::get('/admin', 'administrador\indexController@index')->middleware('auth','role:admin')->name('index');
Route::get('/admin/fotografos', 'administrador\fotografosController@index')->middleware('auth','role:admin');
Route::get('admin/categorias', 'administrador\categoriasController@index')->middleware('auth','role:admin');
Route::get('/admin/papelera','administrador\papeleraController@index')->middleware('auth','role:admin')->name('papelera');
Route::get('/admin/generos','administrador\generosController@index')->middleware('auth','role:admin');
Route::get('/admin/estatus','administrador\estatusController@index')->middleware('auth','role:admin');
Route::get('/admin/usuarios','administrador\usuariosController@index')->middleware('auth','role:admin');
Route::get('/admin/colecciones','administrador\coleccionesController@index')->middleware('auth','role:admin');
Route::get('/admin/coleccion/{id}','administrador\coleccionesController@listadoFotosColeccion')->middleware('auth','role:admin');
Route::get('/admin/agregar/coleccion/{id}','administrador\coleccionesController@AgregarFotosColeccion')->middleware('auth','role:admin');
Route::get('/admin/publicado','administrador\publicacionesController@index')->middleware('auth','role:admin');
//cms
Route::get('/admin/cms/institucional','administrador\cms\indexController@index')->middleware('auth','role:admin')->name('cmsInstitucional');
Route::get('/admin/cms/institucional/logos','administrador\cms\logosController@index')->middleware('auth','role:admin')->name('cmsInstitucionalLogos');
Route::get('/admin/cms/institucional/telefonos','administrador\cms\telefonosController@index')->middleware('auth','role:admin')->name('cmsInstitucionalTelefonos');
Route::get('/admin/cms/institucional/sociales','administrador\cms\socialesController@index')->middleware('auth','role:admin')->name('cmsInstitucionalSociales');
Route::get('/admin/cms/institucional/direcciones','administrador\cms\direccionesController@index')->middleware('auth','role:admin')->name('cmsInstitucionalDirecciones');
Route::get('/admin/cms/secciones','administrador\cms\seccionesController@index')->middleware('auth','role:admin')->name('cmsSecciones');
Route::get('/admin/cms/secciones/encabezado','administrador\cms\encabezadoController@index')->middleware('auth','role:admin')->name('cmsSeccionesEncabezado');
Route::get('/admin/cms/secciones/navegacion','administrador\cms\navegacionController@index')->middleware('auth','role:admin')->name('cmsSeccionesNavegacion');
//reportes graficas
Route::get('/admin/reportes','administrador\reportes\indexController@index')->middleware('auth','role:admin')->name('reportes');
Route::get('/admin/reportes/fotografos','administrador\reportes\fotografosController@index')->middleware('auth','role:admin')->name('reportesFotografos');
Route::get('/admin/reportes/imagenes','administrador\reportes\imagenesController@index')->middleware('auth','role:admin')->name('reportesImagenes');
Route::get('/admin/graficas','administrador\graficas\indexController@index')->middleware('auth','role:admin')->name('graficas');
Route::get('/admin/graficas/imagenes','administrador\graficas\imagenesController@index')->middleware('auth','role:admin')->name('graficasImagenes');


Route::post('/admin/fotografia', 'administrador\indexController@crearFoto')->middleware('auth','role:admin');
Route::post('/admin/fotografiaMultiples', 'administrador\indexController@crearMultiplesFotos')->middleware('auth','role:admin');
Route::post('/admin/fotografia/eliminar', 'administrador\indexController@eliminarFoto')->middleware('auth','role:admin');
Route::post('/admin/fotografia/publicar', 'administrador\indexController@modificaEstatusFoto')->middleware('auth','role:admin');
Route::post('/admin/publicaciones/modificaEstatusFoto', 'administrador\publicacionesController@modificaEstatusFoto')->middleware('auth','role:admin');
Route::post('/admin/colecciones', 'administrador\coleccionesController@crearColecciones')->middleware('auth','role:admin');
Route::post('/admin/fotografo', 'administrador\fotografosController@crearFotografo')->middleware('auth','role:admin');
Route::post('/admin/categoria', 'administrador\categoriasController@crearCategoria')->middleware('auth','role:admin');
Route::post('/admin/genero', 'administrador\generosController@crearGenero')->middleware('auth','role:admin');
Route::post('/admin/estatus','administrador\estatusController@crearEstatus')->middleware('auth','role:admin');
Route::post('/admin/usuarios', 'administrador\usuariosController@crearUsuarios')->middleware('auth','role:admin');
Route::post('/admin/cms/institucional/logo','administrador\cms\logosController@agregarLogo')->middleware('auth','role:admin');
Route::post('/admin/cms/institucional/logo/publicar','administrador\cms\logosController@publicarLogo')->middleware('auth','role:admin');
Route::post('/admin/cms/institucional/sociales/','administrador\cms\socialesController@agregarSocial')->middleware('auth','role:admin');
Route::post('/admin/cms/institucional/sociales/publicar','administrador\cms\socialesController@publicarSocial')->middleware('auth','role:admin');
Route::post('/admin/cms/institucional/direcciones','administrador\cms\direccionesController@agregarDireccion')->middleware('auth','role:admin');
Route::post('/admin/cms/institucional/direcciones/publicar','administrador\cms\direccionesController@publicarDireccion')->middleware('auth','role:admin');
Route::post('/admin/cms/institucional/telefonos/','administrador\cms\telefonosController@agregarTelefono')->middleware('auth','role:admin');
Route::post('/admin/cms/institucional/telefonos/publicar','administrador\cms\telefonosController@publicarTelefono')->middleware('auth','role:admin');
Route::post('/admin/cms/secciones/encabezado/conectar','administrador\cms\encabezadoController@encabezadoConectar')->middleware('auth','role:admin');//los encabezados faltan por desarrollar
Route::post('/admin/cms/secciones/encabezado/quitar','administrador\cms\encabezadoController@encabezadoQuitar')->middleware('auth','role:admin');//los encabezados faltan por desarrollar
Route::post('/admin/cms/secciones/navegacion/publicar','administrador\cms\navegacionController@navegacionPublicar')->middleware('auth','role:admin');
Route::post('/admin/cms/secciones/navegacion/quitar','administrador\cms\navegacionController@navegacionQuitar')->middleware('auth','role:admin');
Route::post('/admin/papelera/vaciar', 'administrador\papeleraController@vaciarFotos')->middleware('auth','role:admin');
Route::post('/admin/papelera/restaurar', 'administrador\papeleraController@restaurarFoto')->middleware('auth','role:admin');

Route::delete('/admin/colecciones', 'administrador\coleccionesController@eliminarColeccion')->middleware('auth','role:admin');//elimina la colección completa
Route::delete('/admin/fotografos', 'administrador\fotografosController@eliminarFotografos')->middleware('auth','role:admin');
Route::delete('/admin/categorias', 'administrador\categoriasController@eliminarCategorias')->middleware('auth','role:admin');
Route::delete('/admin/generos', 'administrador\generosController@eliminarGeneros')->middleware('auth','role:admin');
Route::delete('/admin/estatus', 'administrador\estatusController@eliminarEstatus')->middleware('auth','role:admin');
Route::delete('/admin/usuarios', 'administrador\usuariosController@eliminarUsuarios')->middleware('auth','role:admin');
Route::delete('/admin/cms/institucional/sociales','administrador\cms\socialesController@eliminarSocial')->middleware('auth','role:admin');
Route::delete('/admin/cms/institucional/direcciones','administrador\cms\direccionesController@eliminarDireccion')->middleware('auth','role:admin');
Route::delete('/admin/cms/institucional/telefonos','administrador\cms\telefonosController@eliminarTelefono')->middleware('auth','role:admin');

Route::put('/admin/coleccion/agregar','administrador\coleccionesController@agregarfotoColeccion')->middleware('auth','role:admin');
Route::put('/admin/coleccion/modificaEstatusFoto', 'administrador\coleccionesController@modificaEstatusFoto')->middleware('auth','role:admin');
Route::put('/admin/coleccion','administrador\coleccionesController@eliminarFotoColeccion')->middleware('auth','role:admin');//elimina la foto de la colección

//rutas del login
Auth::routes(["register" => false]);
