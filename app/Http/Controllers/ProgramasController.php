<?php

namespace App\Http\Controllers;
use App\Programas;
use Illuminate\Http\Request;

class ProgramasController extends Controller
{
    public function index()
    {
    	return Programas::all();
    }

    public function show(Programas $id)
    {
    	return $programas = Programas::find($id->id);
    }

        public function store(Request $request)
        {
           try { 
               $prog = Programas::where('nombre','=',$request->nombre)->get();
               if (count($prog)) {
                   return response()->json(
                    [
                        "status"=>304,
                        "mensaje"=>" No se puede guardar, Ya se registro un programa llamado {$request->nombre}"
                    ]);
               }else{
             // dd($prog);
                   $prog = new Programas();
                   $prog->nombre=$request['nombre'];
                   $prog->activo=$request['activo'];
                   $prog->save();
                   return response()->json(
                      [
                         'data'=>$prog,
                         'status'=>200,
                         'mensaje'=>'Guardado correctamente',

                     ]);
               }
           } catch(\Illuminate\Database\QueryException $ex){ 
              dd($ex->getMessage()); 
          }
      }

      public function update(Request $request, Programas $id)
      {
        try { 
            $id->nombre=$request['nombre'];
            $id->activo=$request['activo'];
            $id->save();
            return response()->json(
              [
               'data'=>$id,
               'status'=>200,
               'mensaje'=>'Programa actualizado correctamente',

           ]);
        } catch(\Illuminate\Database\QueryException $ex){ 
          dd($ex->getMessage()); 
      }
    }

    public function delete(Programas $id)
    {
        $id->delete();

        return response()->json(
         ["mensaje"=>"El programa se elimino Correctamente"
         ]);
    }







}
