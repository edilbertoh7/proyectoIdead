<?php

namespace App\Http\Controllers;
use DB;
use App\Cat;
// use App\Departamentos;
// use App\Municipios;
use Illuminate\Http\Request;

class CatsControllers extends Controller
{
   public function index()
   {
   	$cats = DB::table('cats')
		->join('departamentos','departamentos.id', '=', 'cats.departamento_id')
		->join("municipios","municipios.id", "=", "cats.municipio_id")
		->select("cats.id","cats.nombre","cats.direccion","cats.email","departamentos.nombre AS depa","municipios.nombre AS muni","cats.activo")
		->get();

		$resdepa = DB::table('departamentos')
		->select("id","nombre")
		->get();
		
		return response()->json([
			'data'=>$cats,
			'departamento'=>$resdepa
		]);
   }

   public function show(Cat $id)
   {
   	$cats = DB::table('cats')
		->join('departamentos','departamentos.id', '=', 'cats.departamento_id')
		->join("municipios","municipios.id", "=", "cats.municipio_id")
		->select("cats.id","cats.nombre","cats.direccion","cats.email","departamentos.nombre AS depa","municipios.nombre AS muni","cats.activo")
		->where("cats.id",$id->id)
		->get();

		$resdepa = DB::table('departamentos')
		->select("id","nombre")
		->get();
		return response()->json([
			'data'=>$cats,
			'status'=>4,
			'departamento'=>$resdepa
		]);
   }

   public function store(Request $request)
   {
   	// dd($request->nombre);
   // consulto si ya existe el nombre del cat 
   	$cats = DB::table('cats')
   	->join('departamentos','departamentos.id', '=', 'cats.departamento_id')
   	->join("municipios","municipios.id", "=", "cats.municipio_id")
   	->select("cats.id","cats.nombre","cats.direccion","cats.email","departamentos.nombre AS depa","municipios.nombre AS muni","cats.activo")
   	->where("cats.nombre","{$request->nombre}")
   	->get();

   	if (count($cats)) {
   		return response()->json(
   			[
   				"status"=>304,
   				"mensaje"=>"Ya existe un Un CAT llamado {$request->nombre} por favor intentelo de nuevo"
   			]);
   	}else{
   		$cl = new Cat();
   		$cl->nombre=$request['nombre'];
   		$cl->direccion=$request['direccion'];
   		$cl->email=$request['email'];
   		$cl->departamento_id=$request['departamento_id'];
   		$cl->municipio_id=$request['municipio_id'];
   		$cl->activo=$request['activo'];
   		$cl->save();
   		return response()->json(
   			[
   				"data"=>$cl,
   				"status"=>200,
   				"mensaje"=>"Guardado Correctamente"
   			]);
   	}
   }
   public function update(Request $request, Cat $id)
   {
   	# code...
   }


}
