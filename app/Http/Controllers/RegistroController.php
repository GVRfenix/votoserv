<?php

namespace App\Http\Controllers;
use App\Modelos\Total;
use App\Modelos\recinto;
use App\Modelos\totalPresi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    public function index(){
		$titlulo="resultados de votacion";
		
	}
	
	public function nuevo(){
		$recintos = recinto::select('recinto_provincia')
							->distinct('recinto_provincia')->get();
		//dd($recintos);
		$rec=array();
		$cont=0;
		foreach($recintos as $recinto){
			$rec[$cont]= "$recinto->recinto_provincia";
			$cont++;
		}
		///dd(compact('titulo', 'rec'));
		$titlulo="Registro de votacion";
		return view('registro.registro', compact('rec'));
		
	}
	
	public function guardar(){
		$datos = request()->validate([
			'idrecint'  => 'required',
			'nmesa'  	=> 'required',
			'presi_cc'  => 'required',
			'presi_ucs' => 'required',
			'presi_pdc' => 'required',
			'presi_fpv' => 'required',
			'presi_mas' => 'required',
			'presi_mnr' => 'required',
			'presi_mts' => 'required',
			'presi_bdn' => 'required',
			'presi_pan' => 'required',
			'presi_nu' => 'required',
			'presi_blan' => 'required',
			'unino_cc'  => 'required',
			'unino_ucs' => 'required',
			'unino_pdc' => 'required',
			'unino_fpv' => 'required',
			'unino_mas' => 'required',
			'unino_mnr' => 'required',
			'unino_mts' => 'required',
			'unino_bdn' => 'required',
			'unino_pan' => 'required',
			'unino_nul' => 'required',
			'unino_blan' => 'required'
		],[
			'idrecint.required'  => 'Debe seleccionar un recinto',
			'nmesa.required' 	 => 'Coloque numero de mesa',
			'presi_cc.required'  => 'El campo obligatorio',
			'presi_ucs.required' => 'El campo obligatorio',
			'presi_pdc.required' => 'El campo obligatorio',
			'presi_fpv.required' => 'El campo obligatorio',
			'presi_mas.required' => 'El campo obligatorio',
			'presi_mnr.required' => 'El campo obligatorio',
			'presi_mts.required' => 'El campo obligatorio',
			'presi_bdn.required' => 'El campo obligatorio',
			'presi_pan.required' => 'El campo obligatorio',
			'presi_nu.required' => 'El campo obligatorio',
			'presi_blan.required' => 'El campo obligatorio',
			'unino_cc.required'  => 'El campo obligatorio',
			'unino_ucs.required' => 'El campo obligatorio',
			'unino_pdc.required' => 'El campo obligatorio',
			'unino_fpv.required' => 'El campo obligatorio',
			'unino_mas.required' => 'El campo obligatorio',
			'unino_mnr.required' => 'El campo obligatorio',
			'unino_mts.required' => 'El campo obligatorio',
			'unino_bdn.required' => 'El campo obligatorio',
			'unino_pan.required' => 'El campo obligatorio',
			'unino_nul.required' => 'El campo obligatorio',
			'unino_blan.required' => 'El campo obligatorio'
		]);
		$data = recinto::select('recinto_habilitados', 'recinto_nmesas')
							->where('recinto_id', '=', "{$datos['idrecint']}")->get();
		$habilitados=$data[0]->recinto_habilitados;
		$sumatoria=$datos['presi_cc'] + $datos['presi_ucs'] + $datos['presi_pdc'] + $datos['presi_fpv'] + $datos['presi_mas'] + $datos['presi_mnr'] + $datos['presi_mts'] + $datos['presi_bdn'] + $datos['presi_pan'];
		//dd($datos);
		//if($habilitados>=$sumatoria){
			$total = Total::create([
				'recinto' 	=> $datos['idrecint'],
				'nmesa'  	=> $datos['nmesa'],
				'presi_cc'  => $datos['presi_cc'],
				'presi_ucs' => $datos['presi_ucs'],
				'presi_pdc' => $datos['presi_pdc'],
				'presi_fpv' => $datos['presi_fpv'],
				'presi_mas' => $datos['presi_mas'],
				'presi_mnr' => $datos['presi_mnr'],
				'presi_mts' =>$datos['presi_mts'],
				'presi_bdn' => $datos['presi_bdn'],
				'presi_pan' => $datos['presi_pan'],
				'presi_nulo' => $datos['presi_nu'],
				'presi_blan' => $datos['presi_blan'],
				'unino_cc'  => $datos['unino_cc'],
				'unino_ucs' => $datos['unino_ucs'],
				'unino_pdc' => $datos['unino_pdc'],
				'unino_fpv' => $datos['unino_fpv'],
				'unino_mas' => $datos['unino_mas'],
				'unino_mnr' => $datos['unino_mnr'],
				'unino_mts' => $datos['unino_mts'],
				'unino_bdn' => $datos['unino_bdn'],
				'unino_pan' =>	$datos['unino_pan'],
				'unino_nulo' =>	$datos['unino_nul'],
				'unino_blan' =>	$datos['unino_blan'],
				'total_fec_reg' => Carbon::now('America/Caracas')
			]);
			return redirect()->route('registro.resultados');
		/*} else{
			//$datos->validate([],['idrecint.required'  => 'los votantes exceden el numero de habilitados']);
			$dat = 'excede cantidad de habilitados';
			//return view('registro.registro', compact('dat'));
		}*/
	}
	
	public function datos(Request $respuesta){
		$dato = request()->all();
		//dd($dato);
		if(strcmp($dato['tipo'], 'prov')===0){
			$data = recinto::select('recinto_municipio')
							->where('recinto_provincia', '=', "{$dato['dat']}")
							->distinct('recinto_municipio')->get();
		} elseif(strcmp($dato['tipo'], 'muni')===0){
			$data = recinto::select('recinto_asiento_elec')
							->where('recinto_municipio', '=', "{$dato['dat']}")
							->distinct('recinto_asiento_elec')->get();
		} elseif(strcmp($dato['tipo'], 'asien')===0){
			$data = recinto::select('recinto_nombre')
							->where('recinto_asiento_elec', '=', "{$dato['dat']}")
							->distinct('recinto_nombre')->get();
		} elseif(strcmp($dato['tipo'], 'recinto')===0){
			$data = recinto::select('recinto_id')
							->where('recinto_nombre', '=', "{$dato['dat']}")->get();
		}
		//dd($data);
		return response()->json($data, 200);
	}
	
	public function lista(){
		$titulo = 'Lista de Viajes';
		$datos = false;
		if(request()->all()){//;die;
			$datos = request()->all();
		}
		if(isset($datos['editar'])  && strcmp($datos['id_usado'], "")!=0){
            //$sesion->chofer = $datos['id_usado'];
            return redirect("registro/{$datos['id_usado']}"); 
        }
		if(isset($datos['nuevo']) ){
			//echo 'entro por true';die;
            return redirect()->route('registro.nuevo');
        }
		$buscar='';
		$columnas = array(
            array( 't_col' => 'ID',         		 'n_col' => 'total_id',   	'tipo_col'=>'numero','n_getter'=>'total_id',	'width' =>'0px', 'visible' =>false,'t_class' =>'no-mostrar', 't_id'=>'', 'c_class' =>'no-mostrar', 'c_id'=>'' ),
            array( 't_col' => 'PROV.',	'n_col' => 'recinto_provincia',    	'tipo_col'=>'texto', 'n_getter'=>'recinto_provincia',     	'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
            array( 't_col' => 'MUNI.',  'n_col' => 'recinto_municipio',  	'tipo_col'=>'texto', 'n_getter'=>'recinto_municipio',    'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
            array( 't_col' => 'LOCAL.',  'n_col' => 'recinto_asiento_elec', 	'tipo_col'=>'texto', 'n_getter'=>'recinto_asiento_elec', 'width' =>'10px', 'visible' =>true, 'ordenar'=>false),
            array( 't_col' => 'RECINTO',    'n_col' => 'recinto_nombre',	'tipo_col'=>'texto', 'n_getter'=>'recinto_nombre','width' =>'10px', 'visible' =>true, 'ordenar'=>false),
            array( 't_col' => 'CIRC.','n_col' => 'recinto_circ',   	'tipo_col'=>'texto', 'n_getter'=>'recinto_circ',   'width' =>'10px', 'visible' =>true, 'ordenar'=>false),
            array( 't_col' => 'Nº MESA',	'n_col' => 'nmesa',    	'tipo_col'=>'texto', 'n_getter'=>'nmesa',    'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
			array( 't_col' => 'CC',    		'n_col' => 'presi_cc',      	'tipo_col'=>'texto', 'n_getter'=>'presi_cc',      'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
			array( 't_col' => 'UCS',   		'n_col' => 'presi_ucs', 	'tipo_col'=>'texto', 'n_getter'=>'presi_ucs', 'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
			array( 't_col' => 'PDC',   		'n_col' => 'presi_pdc',      	'tipo_col'=>'texto', 'n_getter'=>'presi_pdc', 'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
			array( 't_col' => 'FPV',   		'n_col' => 'presi_fpv', 	'tipo_col'=>'texto', 'n_getter'=>'presi_fpv', 'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
			array( 't_col' => 'MAS-IPSP',	'n_col' => 'presi_mas',      	'tipo_col'=>'texto', 'n_getter'=>'presi_mas',   'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
			array( 't_col' => 'MNR',		'n_col' => 'presi_mnr', 	'tipo_col'=>'texto', 'n_getter'=>'presi_mnr', 'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
			array( 't_col' => 'MTS',        'n_col' => 'presi_mts',      	'tipo_col'=>'texto', 'n_getter'=>'presi_mts', 'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
			array( 't_col' => 'BDN',        'n_col' => 'presi_bdn', 	'tipo_col'=>'texto', 'n_getter'=>'presi_bdn',	'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
			array( 't_col' => 'PAN',        'n_col' => 'presi_pan', 	'tipo_col'=>'texto', 'n_getter'=>'presi_pan', 'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
			array( 't_col' => 'NULO',       'n_col' => 'presi_nulo',      	'tipo_col'=>'texto', 'n_getter'=>'presi_nulo','width' =>'10px', 'visible' =>true, 'ordenar'=>true),
			array( 't_col' => 'BLANCO',		'n_col' => 'presi_blan', 	'tipo_col'=>'texto', 'n_getter'=>'presi_blan', 'width' =>'10px', 'visible' =>true, 'ordenar'=>true),
		);
        /*if(isset($datos['busca']) && strcmp($datos['busca'],'')!==0){
        	$total = Total::where('sol_via_destino', 'ilike', "%{$datos['busca']}%")
							->orWhere('sol_via_itinerario', 'ilike', "%{$datos['busca']}%")
							->orWhere('sol_via_motivo', 'ilike', "%{$datos['busca']}%")
							->paginate(5);
			$Dbuscar = $datos['busca'];
		} else {*/
			$total = Total::orderBy('total_id','DESC')->paginate(10);
			$recinto = recinto::orderBy('recinto_id','DESC')->paginate(10);
		//}
		$resul = totalPresi::all();
		
		//$resul = DB::select('SELECT * FROM total_presi ');
		
		//dd($resul);
		//dd($total[0]->recin->recinto_provincia);
		//dd(compact('total'));
		return view('registro.totales', compact('titulo', 'buscar', 'columnas', 'total'));
	}
}