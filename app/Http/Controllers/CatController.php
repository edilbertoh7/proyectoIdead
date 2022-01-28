<?php

namespace App\Http\Controllers;
use DB;
use App\Cat;
// use App\Departamentos;
// use App\Municipios;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index(Request $request)
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
			'status'=>400,
			'mensaje'=>'insertado con exito',
			'departamento'=>$resdepa
		]);
    }

    public function store(Request $request)
    {
    	$cl = new Cat();
        $cl->nombre=$request['nombre'];
		$cl->direccion=$request['direccion'];
		$cl->email=$request['email'];
		$cl->departamento_id=$request['departamento_id'];
		$cl->municipio_id=$request['municipio_id'];
		$cl->activo=$request['activo'];
		$cl->save();
		return response()->json($cl, 201);

    }

    public function update(Request $request, Cat $id)
    {
    	$cl = new Cat();
        $id->nombre=$request['nombre'];
		$id->direccion=$request['direccion'];
		$id->email=$request['email'];
		$id->departamento_id=$request['departamento_id'];
		$id->municipio_id=$request['municipio_id'];
		$id->activo=$request['activo'];
		$id->save();

		return response()->json($id, 200);
    }

    public function delete(Cat $id)
    {
    	$id->delete();

        return response()->json(null, 204);
    }



}
