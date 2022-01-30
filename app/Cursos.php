<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $fillable = [
    	'programa_id',
		'nombre', 
		'activo',
	];

	protected $hidden = ['created_at','updated_at'];
}
