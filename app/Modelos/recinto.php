<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class recinto extends Model
{
    //
	protected $table = 'recinto';
	protected $primaryKey = 'recinto_id';
	protected $fillable = [
        'recinto_provincia', 'recinto_municipio', 'recinto_asiento_elec', 'recinto_nombre', 'recinto_circ', 'recinto_nmesas', 'recinto_habilitados','recinto_gestion'
    ];
}
