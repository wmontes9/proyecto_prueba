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

Route::get('/', function () {
    return view('welcome'); // pagina princial
});
Route::resource("admin/solucion","SolucionController");
Route::get("admin/getSolucion","SolucionController@getSoluciones");

Route::get('/listaTiposId', 'Auth\RegisterController@getTiposIdentificacion'); // lista tipos de identificación
Route::get('/listaRoles', 'RolController@getRoles'); //Lista de roles

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
Route::resource("admin/retos","RetoController"); //administración de retos

Route::resource("admin/grupo","GrupoInvestController"); // administración grupo de investigacion
Route::get('admin/listaGrupos','GrupoInvestController@getListaGrupos')->name('listaGrupos');
Route::get('admin/retos/publicar/{id}','RetoController@publicarReto');
//Route::post('admin/nuevo','GrupoInvestController@guardarGrupoNuevo')->name('guardarGrupo');
//Route::put('admin/actualizar/{id}','GrupoInvestController@actualizarGrupo')->name('actualizarGrupo');
//Route::delete('admin/eliminar/{id}','GrupoInvestController@eliminarGrupo')->name('eliminarGrupo');

Route::get('admin/getretos','RetoController@getretos');
//Route::post('admin/retos/update/{id}','RetoController@update');



Route::get('getretos','RetoController@getRetosPublicados');
Route::get('retos','RetoController@getinfo');
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
    Route::resource("innovacion","innovacionController");
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
