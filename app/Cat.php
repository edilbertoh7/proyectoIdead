<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
	protected $fillable = [
		'nombre', 
		'direccion',
		'email',
		'departamento_id',
		'municipio_id',
		'activo',
	];

	protected $hidden =['updated_at','delete_at','created_at'];
}
