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
      try { 

          $cats = DB::table('cats')
          ->join('departamentos','departamentos.id', '=', 'cats.departamento_id')
          ->join("municipios","municipios.id", "=", "cats.municipio_id")
          ->select("cats.id","cats.nombre","cats.direccion","cats.email","departamentos.id as d_id","departamentos.nombre AS depa","municipios.id as m_id","municipios.nombre AS muni","cats.activo")
          ->get();

          $resdepa = DB::table('departamentos')
          ->select("id","nombre")
          ->get();

          return response()->json([
            'data'=>$cats,
            'departamento'=>$resdepa
         ]);
       } catch(\Illuminate\Database\QueryException $ex){ 
        dd($ex->getMessage()); 
       }
   }

   public function show(Cat $id)
   {
      try { 
        
         	$cats = DB::table('cats')
          ->join('departamentos','departamentos.id', '=', 'cats.departamento_id')
          ->join("municipios","municipios.id", "=", "cats.municipio_id")
          ->select("cats.id","cats.nombre","cats.direccion","cats.email","departamentos.id as d_id","departamentos.nombre AS depa","municipios.id as m_id","municipios.nombre AS muni","cats.activo")
          ->where("cats.id",$id->id)
          ->get();

          $resdepa = DB::table('departamentos')
          ->select("id","nombre")
          ->get();
          return response()->json([
            'data'=>$cats,
            'status'=>201,
            'departamento'=>$resdepa
         ]);
      } catch(\Illuminate\Database\QueryException $ex){ 
        dd($ex->getMessage()); 
      }
   }

   public function store(Request $request)
   {
         
      try { 
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
              "mensaje"=>"CAT Guardado Correctamente"
           ]);
       }
      } catch(\Illuminate\Database\QueryException $ex){ 
        dd($ex->getMessage()); 
      }
   }

   public function update(Request $request, Cat $id)
   {

      try { 
         $id->nombre=$request['nombre'];
         $id->direccion=$request['direccion'];
         $id->email=$request['email'];
         $id->departamento_id=$request['departamento_id'];
         $id->municipio_id=$request['municipio_id'];
         $id->activo=$request['activo'];
         $id->save();

         return response()->json(
            [
               "data"=>$id,
               "status"=>200,
               "mensaje"=>"El CAT fue actualizado con exito"
            ]);
      } catch(\Illuminate\Database\QueryException $ex){ 
        dd($ex->getMessage()); 
     }
  }

public function delete(Cat $id)
{
   $id->delete();

   return response()->json(
      [
         "mensaje"=>"Se elimino el CAT Correctamente"
      ]);
}


}
