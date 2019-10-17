<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Mesas extends Model
{
    //
	protected $table = 'mesas';
	protected $primaryKey = 'mesa_id';
	protected $fillable = [
	'mesa_numero','mesa_habili','mesa_gestion','recinto'
	];
	
	public function recin(){
		return $this->belongsTo(recinto::class, 'recinto');
	}
	
}
