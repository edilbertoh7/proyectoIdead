<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{
    protected $fillable = [
        'user_id', 'tipo_documento_id', 'numero_documento','primer_nombre','segundo_nombre','primer_apellido','segundo_apellido'
    ];

     protected $hidden = [
         'created_at','updated_at',
    ];
}
