<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analitics extends Model
{
    protected $fillable = [
        'token', 'dashboard'
    ];
    protected $hidden = [
        'created_at','updated_at',
    ];
}
