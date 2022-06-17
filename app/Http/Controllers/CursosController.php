<?php

namespace App\Http\Controllers;
use DB;
use App\Cursos;
use App\Programas;
use Illuminate\Http\Request;

class CursosController extends Controller
{

	public function index()
	{
		try { 
			$cursos = Cursos::join('programas','cursos.programa_id','=','programas.id')
			->select('cursos.id','programas.id as p_id','programas.nombre AS nombprog', 'cursos.nombre AS nombcurso','cursos.activo')
			->get();
    	// consulto los programas para poblar el respectivo combo en la vista
			$programas =  Programas::all('id','nombre');
			return response()->json(
				[
					'cursos'=>$cursos,
					'programas'=>$programas
				]);
		} catch(\Illuminate\Database\QueryException $ex){ 
			dd($ex->getMessage()); 
		}

	}

	public function show(Cursos $id)
	{
		try { 

			$cursos = Cursos::join('programas','cursos.programa_id','=','programas.id')
			->select('cursos.id','programas.id as p_id','programas.nombre AS nombprog', 'cursos.nombre AS nombcurso','cursos.activo')
			->where('cursos.id',$id->id)
			->get();
    	// consulto los programas para poblar el respectivo combo en la vista
			$programas =  Programas::all('id','nombre');
			return response()->json(
				[
					'cursos'=>$cursos,
					'programas'=>$programas,
					'status'=>200
				]);
		} catch(\Illuminate\Database\QueryException $ex){ 
			dd($ex->getMessage()); 
		}
	}

	public function store(Request $request)
	{
		try { 

			$sql = "select nombre from cursos where nombre=? and programa_id=?";
			$curso = DB::select($sql,array($request->nombre,$request->programa_id));

			if (count($curso)) {
				return response()->json(
					[
						"status"=>304,
						"mensaje"=>"No se puede crear el Curso, ya existe  un curso creado con ese nombre"
					]);
			}else{

				$cr = new Cursos();
				$cr->programa_id=$request['programa_id'];
				$cr->nombre=$request['nombre'];
				$cr->activo=$request['activo'];
				$cr->save();
				return response()->json(
					[
						"data"=>$cr,
						"status"=>200,
						"mensaje"=>"El curso se guardo Correctamente"
					]);
			}
		} catch(\Illuminate\Database\QueryException $ex){ 
			dd($ex->getMessage()); 
		}


	}

	public function update(Request $request , Cursos $id)
	{
		try { 
			$id->programa_id=$request['programa_id'];
			$id->nombre=$request['nombre'];
			$id->activo=$request['activo'];
			$id->save();
			return response()->json(
				[
					"data"=>$id,
					"status"=>200,
					"mensaje"=>"El curso se guardo Correctamente"
				]);
		} catch(\Illuminate\Database\QueryException $ex){ 
			dd($ex->getMessage()); 
		}
	}

	public function delete(Cursos $id)
	{
		$id->delete();
		return response()->json(
			[
				"mensaje"=>"Se elimino el curso Correctamente"
			]);
	}



}
