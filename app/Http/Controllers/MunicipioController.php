<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function show($id)
    {
    return	$resdepa = DB::table('municipios')
		->select("id","nombre")
		->where("municipios.departamento_id",$id)
		->get();
		
    }
}
