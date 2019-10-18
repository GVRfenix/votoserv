<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presidente;
use App\Circunscripcion;
use App\Provincia;
use App\Municipio;
use App\Modelos\Mesas;
use App\Modelos\Habcirc;
use App\Modelos\Habmuni;
use App\Modelos\Habrecinto;
use App\Modelos\TotalCirc;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presidente = Presidente::first();
        $circun = Circunscripcion::get();
        $circuns = TotalCirc::first();
        $provincias = Provincia::get();
		$municipios = Municipio::get();
		$totalElectore= Mesas::all()->sum('mesa_habili');
		//$Presidente = totalPresi::all();
		$porcen = round(($presidente->validos/$totalElectore)*100, 2);
		$porcenU = round(($circuns->validos/$totalElectore)*100, 2);
		//dd($circun);
        return view('welcome', compact('presidente', 'circuns', 'provincias', 'municipios', 'porcen', 'totalElectore','porcenU', 'circun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
