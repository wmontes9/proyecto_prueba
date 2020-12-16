<?php
Route::get("/listaArea","AreaConocimientoController@getArea");
Route::get("/listaGrupoInvestigacion","GrupoInvestigacionController@getGrupoIn");
Route::get("/listaLinea","LineaInvestController@getLinea");
Route::get("/listaSubLinea","SubLineaInvestController@getSubLinea");
Route::get("/listaSemillero","SemilleroInvestController@getSemillero");
Route::get("SubLineaSemilleros/{id}","SubLineaInvestController@SubLineaSemilleros");
//oute::get("/listaSubLineaSemilleros","SubLineaInvestController@getSubLineaSemilleros");



Route::resource("areaconocimiento","AreaConocimientoController");
Route::resource("grupoinvestigacion","GrupoInvestigacionController");
Route::resource("lineainvestigacion","LineaInvestController");
Route::resource("sublineainvestigacion","SubLineaInvestController");
Route::resource("semilleros","SemilleroInvestController");
//Route::resource("SubLineaSemilleros","SubLineaInvestController");
//Route::get('grupoDeInvestigacion/getSubLineaSemilleros','SubLineaInvestController@getSubLineaSemilleros');