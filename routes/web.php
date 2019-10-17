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

Route::get('/', 'WelcomeController@index');


//Route::get("/inicio", "InicioController");

Route::get('/registro/nuevo', "RegistroController@nuevo")
		->name("registro.nuevo");

Route::post('/registro/almacenar', "RegistroController@guardar")
		->name("registro.guardar");

Route::post('/datos', 'RegistroController@datos')
		->name("registro.datos");
		
Route::get('/registro/resultados', "RegistroController@lista")
		->name("registro.resultados");
		
Route::post('/registro/resultados', "RegistroController@lista")
		->name("registro.resultados");
