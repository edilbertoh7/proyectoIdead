<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
    protected $fillable = [
		'nombre', 
		'activo',
	];

	protected $hidden =['created_at','updated_at'];
}
