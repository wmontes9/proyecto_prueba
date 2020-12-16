<?php
//Route::get('retos','RetoController@getinfo');
Route::get('retos/getretos','RetoController@getretos')->name('getretos');
Route::resource("retos","RetoController");
Route::get('/listaRoles', 'RolController@getRoles'); //Lista de roles
Route::post('/destroyer/{id}','EventoController@destroyer');
Route::get('/getEventos', 'EventoController@getEventos');
Route::resource("eventos","EventoController");