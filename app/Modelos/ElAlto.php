<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ElAlto extends Model
{
    //
	protected $table = 'el_alto';
	protected $primaryKey = 'id';
	protected $fillable = [
		'total_fec_reg', 'presi_cc', 'presi_ucs', 'presi_pdc', 'presi_fpv', 'presi_mas','presi_mnr', 'presi_mts', 'presi_bdn', 'presi_pan', 'presi_nulo', 'presi_blan', 'presi_validos', 'unino_cc', 'unino_ucs', 'unino_pdc', 'unino_fpv', 'unino_mas', 'unino_mnr', 'unino_mts', 'unino_bdn','unino_pan', 'unino_nulo','unino_blan', 'unino_validos'
	];
}
