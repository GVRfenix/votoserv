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

		
Route::get('/registro/lapaz', "RegistroController@nuevolp")
		->name("registro.nlp");

Route::post('/registro/almalapaz', "RegistroController@guardarlp")
		->name("registro.glp");
		
Route::get('/registro/elalto', "RegistroController@nuevoea")
		->name("registro.nea");

Route::post('/registro/almaelalto', "RegistroController@guardarea")
		->name("registro.glp");

Route::get('/registro/resultadoslp', "RegistroController@listalp")
		->name("registro.resultadoslp");
		
Route::post('/registro/resultadoslp', "RegistroController@listalp")
		->name("registro.resultadoslp");
		
Route::get('/registro/resultadosea', "RegistroController@listaea")
		->name("registro.resultadosea");
		
Route::post('/registro/resultadosea', "RegistroController@listaea")
		->name("registro.resultadosea");