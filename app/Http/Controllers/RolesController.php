<?php

namespace App\Http\Controllers;
use DB;
use App\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
    	return $roles =  Roles::all('id','name');
    }
    public function show(Roles $id)
    {

    	try { 
    		$roles = Roles::all('id','name','description')->where('id',$id->id);
		
    		$permisos = DB::table('permissions')->select('id','name','description')->get();

    		$permisorol = DB::table('permission_roles')->select('permission_id')->where('role_id',$id->id)->get();

    		return response()->json(
    			[
    				'roles'=>$roles,
    				'permisos'=>$permisos,
    				'permisorol'=>$permisorol
    			]);				
		} catch(\Illuminate\Database\QueryException $ex){ 
		  dd($ex->getMessage()); 
		}


    }

    public function store(Request $request)
    {
    	try { 
 
    	$error = '';
        $mensaje = '';
    	 
    	 if (count(DB::table('roles')->select('name')->where('name',$request['roles'][0]['name'])->get())) {
    	 	$error = 'Ya existe un rol creado con ese nombre';
    	 }
    	 $datarole['name'] = $request['roles'][0]['name'];
    	 $datarole['description'] = $request['roles'][0]['description'];

    	 $permisorol = $request['permisorol'];
    	 if ($error=='') {
            //inicio la transaccion
    	 	DB::beginTransaction();
    	 	DB::table('roles')->insert(
     				[
     					'name' => $request['roles'][0]['name'], 
     					'slug' => $request['roles'][0]['name'],
     					'description' => $request['roles'][0]['description'],
     					'created_at'=>now(),
     					'updated_at'=>now()
     				]);
                // consulto el maxin¿mo id en roles
		     	$idrol=DB::select('select max(id) AS id from roles');

		     	foreach ($request['permisorol'] as  $permiso) {
		     	// por cada permiso se hace una insercion
		     		DB::table('permission_roles')->insert(
	     				[
	     					'permission_id' => intval($permiso['permission_id']), 
	     					'role_id' => intval($idrol[0]->id),
	     					'created_at'=>now(),
	     					'updated_at'=>now()
	     				]);
		 
		     	     }
                     $mensaje ='El Rol ha sido insertado con exito ';
		     	DB::commit();

    	 }
    	 	return response()->json(
    	 		[
    	 			'error'=>$error,
    	 			'data'=>$datarole,
    	 			'permisorol'=>$permisorol,
                    'mensaje'=>$mensaje
    	 		]);
		} catch(\Illuminate\Database\QueryException $ex){ 
		  dd($ex->getMessage()); 
		}

    }

    public function update(Request $request, Roles $id)
    {
        try { 
            $datarole['name'] = $request['roles'][0]['name'];
             $datarole['description'] = $request['roles'][0]['description'];

             $permisorol = $request['permisorol'];

            DB::table('roles')->where('id', $id->id)
            ->update(
                    [
                        'name' => $request['roles'][0]['name'], 
                        'slug' => $request['roles'][0]['name'],
                        'description' => $request['roles'][0]['description'],
                        'updated_at'=>now()
                    ]);
            // elimino los permisos para insertar los actualizados
            DB::table('permission_roles')->where('role_id', '=', $id->id)->delete();

            foreach ($request['permisorol'] as  $permiso) {
                    // por cada permiso se hace una insercion
                    DB::table('permission_roles')->insert(
                        [
                            'permission_id' => intval($permiso['permission_id']), 
                            'role_id' => intval($id->id),
                            'created_at'=>now(),
                            'updated_at'=>now()
                        ]);
         
                     }
                   $mensaje = 'El Rol ha sido actualizado';

                     return response()->json(
                [
                    'data'=>$datarole,
                    'permisorol'=>$permisorol,
                    'mensaje'=>$mensaje
                ]);
                 
                } catch(\Illuminate\Database\QueryException $ex){ 
                  dd($ex->getMessage()); 
                }
    }

    public function delete(Roles $id)
    {
        DB::table('permission_roles')->where('role_id', '=', $id->id)->delete();
        $id->delete();
        return response()->json(
      [
         "mensaje"=>"Los permisos y el rol han sido eliminados del sistema"
      ]);
    }





}
