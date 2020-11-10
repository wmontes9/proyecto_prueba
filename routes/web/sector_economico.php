<?php
//Route::get('retos','RetoController@getinfo');
Route::get('retos/getretos','RetoController@getretos')->name('getretos');
Route::resource("retos","RetoController");