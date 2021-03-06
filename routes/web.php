<?php

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

//require('/routes/web/grupo_investigacion.php');
Route::get('/',"InicioController@index" );

/*Route::get('/', function () {
    return view('welcome'); // pagina princial
}); */
Route::resource("admin/solucion","SolucionController");
Route::get("admin/getSolucion","SolucionController@getSoluciones");

Route::get('/listaTiposId', 'Auth\RegisterController@getTiposIdentificacion'); // lista tipos de identificación
Route::get('/listaGrupos', 'Auth\RegisterController@getGrupos'); //Lista de roles
Route::get('/listaDepartamentos', 'Auth\RegisterController@getDepartamentos');
Route::get("listaMunicipios/{id}","Auth\RegisterController@getMunicipios");
Route::get("/listaSectores","SectorEconomicoController@getSectores");
Route::get("RetosSector/{id}","SectorEconomicoController@RetosSector");
Route::get("SolucionesReto/{id}","SectorEconomicoController@SolucionesReto");
Route::get("listaSolucionesReto","SectorEconomicoController@getSolucionesReto");
//Route::get("RetosSector","SectorEconomicoController@viewRetosSector");
Route::get("listaRetosSector","SectorEconomicoController@getRetosSector");
Route::resource("SectorEconomico","SectorEconomicoController");



Auth::routes();
Route::get('login/google', 'Auth\LoginController@redirectToGoogle'); // logeo google
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
/*Route::group(["middleware"=>['auth']],function(){
    Route::get('/home', 'HomeController@index')->name('user');
    Route::group(["middleware"=>['admin']],function(){
        Route::get('/home', 'HomeController@admin')->name('admin');
    });
});*/
Route::group(["middleware"=>['auth']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    
    /*Route::group(["middleware"=>['admin']],function(){
        Route::get('/home', 'HomeController@admin')->name('admin');
    });*/
});
Route::resource("admin/retos","RetoController");//administración de retos
Route::resource("admin/grupo","GrupoInvestController"); // administración grupo de investigacion
Route::get('admin/listaGrupos','GrupoInvestController@getListaGrupos')->name('listaGrupos');
Route::get('admin/retos/publicar/{id}','RetoController@publicarReto');
//Route::post('admin/nuevo','GrupoInvestController@guardarGrupoNuevo')->name('guardarGrupo');
//Route::put('admin/actualizar/{id}','GrupoInvestController@actualizarGrupo')->name('actualizarGrupo');
//Route::delete('admin/eliminar/{id}','GrupoInvestController@eliminarGrupo')->name('eliminarGrupo');

Route::get('admin/getretos','RetoController@getretos');
//Route::post('admin/retos/update/{id}','RetoController@update');



Route::get('getretos','RetoController@getRetosPublicados');

Route::get('solucion','SolucionController@getinfo');
Route::get("getSolucion/{id}","SolucionController@getgeneralusuario");
Route::get("getSolucionReto","SolucionController@getgeneralreto");
//Route::get('/home', 'HomeController@index')->name('home');
Route::post("contact","ContactoController@store");

/*Route::prefix('grupos')->group(function(){ 
    Route::get('/index','GrupoInvestController@index')->name('gruposIndex');
    Route::get('/listaGrupos','GrupoInvestController@getListaGrupos')->name('listaGrupos');
    Route::post('/nuevo','GrupoInvestController@guardarGrupoNuevo')->name('guardarGrupo');
    Route::put('/actualizar/{id}','GrupoInvestController@actualizarGrupo')->name('actualizarGrupo');
    Route::delete('/eliminar/{id}','GrupoInvestController@eliminarGrupo')->name('eliminarGrupo');
});*/

/**
 * Rutas Cristian
 */
Route::post('/cambiarRol','RolController@cambiarRolSesion');    

Route::post('/crearInstitucion/{tipo?}','InstitucionController@crearInstitucion')->name('crearInstitucion');
Route::get('consultaCIIU/{texto}/filtro/{filtro}','InstitucionController@consultarCIIU');
/**
 * Rutas Administrador
 */
Route::middleware(['admin'])->group(function(){    
    Route::prefix('permisos')->group(function(){
        Route::get('/','PermisosController@index')->name('permisos');
        Route::post('/asignarPermisos', 'PermisosController@asignar')->name('asignarPermisos');
        Route::get('/consultar/{id}','PermisosController@listaPermisosPorGrupo')->name('consulta');
        Route::delete('/remover','PermisosController@remover')->name('removerPermisos');
    });        
   // Route::resource("innovacion","innovacionController");
    Route::resource("admin/solucion","SolucionController");    
    //
});
/**
 * Rutas empresa
 */
Route::post('/datosInstitucion','InstitucionController@datosInstitucion');
Route::post('/actulizarCiiuInstitucion','InstitucionController@actualizarActividades')->name('actualizarActividades');
Route::delete('/quitarActividad','InstitucionController@quitarActividad');
Route::put('/actualizarDatosInstitucion/{id}','InstitucionController@actualizarDatosInstitucion');

Route::prefix('instituciones')->group(function(){
    Route::get('/', function () {
        return view('institucion.index');
    });
    Route::get('/usuarios_asociados/{id}','InstitucionController@vistaUsuariosAsociados');
    //VincularEmpresa
    Route::get('/consultaInstitucion/{nit}','InstitucionController@buscarInstitucion');                        
    Route::post('/vincularEmpresa','InstitucionController@vincularInstitucion')->name('vincularInstitucion');
    Route::get('/usuarios_vinculados/{id}','InstitucionController@usuariosAsociados')->name('usuariosAsociados');            
    Route::patch('/usuarios/vincular/{id_usuario}','InstitucionController@activarSolicitud')->name('activarSolicitud');
    Route::patch('/usuarios/inhabilitar/{id_usuario}','InstitucionController@activarSolicitud')->name('inhabilitar');
});
/**
 * Rutas Grupo de Investigacion
 */
Route::prefix('investigacion')->group(function(){
    Route::get('/index','GrupoInvestController@index');
    Route::post('/crear_grupo','GrupoInvestController@guardarGrupoNuevo')->name('crearGrupo');
    Route::get('/consulta_grupo/{sigla}','GrupoInvestController@consultaGrupo');
});
/**
 * Rutas retos
 */
Route::prefix('retos')->group(function(){ 
    Route::get('/usuario','RetoController@retosUsuario')->name('retosUsuario');
    Route::get('/listaRetos','RetoController@getRetosUsuario')->name('listaRetos');
    Route::post('/nuevo','RetoController@store')->name('guardarRetoUsuario');
    Route::put('/actualizar/{id}','RetoController@actualizarReto')->name('actualizarReto');
    Route::delete('/eliminar/{id}','RetoController@destroy')->name('eliminarReto');
    Route::get('/empresa', 'RetoController@retosEmpresa')->name('retosEmpresa');
});
/**
 * -/
 */
// rutaa grupos de investigación




Route::get('buscar_formulario','Aliados_estrategicosController@formulario')->name('buscar_formulario');
Route::get('buscar','Aliados_estrategicosController@buscar')->name('buscar');
Route::resource('aliados_estrategicos','Aliados_estrategicosController')
    ->names('aliados_estrategicos')
    ->parameters(['aliados_estrategicos' => 'lis_aliados']); 

Route::get('/departamentos','UsuarioController@departamentos');
Route::get('/municipios/{id}','UsuarioController@municipios');
Route::get('/categorias','UsuarioController@categorias');
Route::get('/perfil', 'UsuarioController@actualizardatos')->name('perfil');
Route::resource('perfilusuario','UsuarioController');

Route::get('/listaSoluciones','SolucionController@getSolucionUsuario')->name('listaSoluciones');
Route::get('/solucionesUsuario','SolucionController@solucionesUsuario')->name('solucionesUsuario');
Route::get('/solucionesEmpresa', 'SolucionController@solucionesEmpresa')->name('solucionesEmpresa');
Route::get('admin/listausers','UserController@listaUsers');
Route::resource('admin/user','UserController');

Route::post('admin/destroyer/{id}','ComentarioController@destroyer');
Route::get('admin/getcomentarios','ComentarioController@getComentarios');
Route::resource("admin/comentarios","ComentarioController");

Route::post('admin/destroyer/{id}','GaleriaController@destroyer');
Route::get('admin/getGalerias','GaleriaController@getGalerias');
Route::resource("admin/galerias","GaleriaController");