<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\User_detail;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index()
	{
		try {

		 return $usuarios = DB::table('users as u')
          ->join('user_details as d','d.user_id', '=', 'u.id')
          ->select('u.id','u.email','d.primer_nombre','d.segundo_nombre','d.primer_apellido','d.segundo_apellido')
          ->get();

		} catch(\Illuminate\Database\QueryException $ex){
			dd($ex->getMessage());
		}
	}

	public function show(User $id)
	{
		try {
			 //consulto el usuario por su id
			$usuario = DB::table('users as u')
			->join('user_details as d','d.user_id', '=', 'u.id')
			->select('u.id','u.email','d.primer_nombre','d.segundo_nombre','d.primer_apellido','d.segundo_apellido','d.tipo_documento_id','numero_documento')
			->where('u.id',$id->id)
			->get();
         // consulto los roles disponibles en el sisteam
			$roles = DB::table('roles')
			->select('id','name', 'description')
			->get();

          //consulto los roles que tiene asiciado el usuario
			$role_user = DB::table('role_users as r')
			->join('roles as l','l.id','=','r.role_id')
			->select('l.id','l.name')
			->where('r.user_id','=',$id->id)->get();

         // return $programas = Programas::find($id->id);
         return response()->json(
         	[
         		'usuarios'=>$usuario,
         		'roles'=>$roles,
         		'role_user'=>$role_user
         	]);


         } catch(\Illuminate\Database\QueryException $ex){
         	dd($ex->getMessage());
         }
     }

     public function store(Request $request)
     {//dd($request);
        print_r("hola".$request);
        exit;
     	$error= array();
     	$mensaje='';
		     try {
		     		if (count(User::select('email')->where('email','=',$request['usuarios'][0]['email'])->get())) {
		     			$error['email']='No se puede registrar el usuario este email ya esta en uso';
		     		}
		     		if (count($tre=DB::table('user_details')
		     			->select('numero_documento')
		     			->where('numero_documento','=',$request['usuarios'][0]['numero_documento'])->get())) {
		     			$error['numero_documento']='Ya existe un usuario registrado con ese numero de documento';
		     	}
		     		// guardo la data en un arreglo para devolverlo a la vista
		     	$datausr['email']=$request['usuarios'][0]['email'];
		     	$datausr['primer_nombre']=$request['usuarios'][0]['primer_nombre'];
		     	$datausr['segundo_nombre']=$request['usuarios'][0]['segundo_nombre'];
		     	$datausr['primer_apellido']=$request['usuarios'][0]['primer_apellido'];
		     	$datausr['segundo_apellido']=$request['usuarios'][0]['segundo_apellido'];
		     	$datausr['tipo_documento_id']=$request['usuarios'][0]['tipo_documento_id'];
		     	$datausr['numero_documento']=$request['usuarios'][0]['numero_documento'];
		     	$datausr['password']=$request['usuarios'][0]['password'];

		     	$role_user = $request['role_user'];

		     	// si el numero de documento o email no estan ya registrados en DB se realiza la insercion
		     	if (count($error)==0 ) {
		     		DB::beginTransaction();
		     		// guardoe en la table de usuarios
		     		$usr = new User();
		     		$usr->name='internal';
		     		$usr->email=$request['usuarios'][0]['email'];
		     		$usr->password=bcrypt($request['usuarios'][0]['password']);
		     		$usr->save();

					///selecciono el id maximo de usuarios para enviarlo al detalle del usuario y roles de usuario
		     		$iduser=DB::select('select max(id) AS id from users');

					// guardo el detalle de usuario
		     		$d_usr = new User_detail();
		     		$d_usr->user_id=$iduser[0]->id;
		     		$d_usr->tipo_documento_id=$request['usuarios'][0]['tipo_documento_id'];
		     		$d_usr->numero_documento=$request['usuarios'][0]['numero_documento'];
		     		$d_usr->primer_nombre=$request['usuarios'][0]['primer_nombre'];
		     		$d_usr->segundo_nombre=$request['usuarios'][0]['segundo_nombre'];
		     		$d_usr->primer_apellido=$request['usuarios'][0]['primer_apellido'];
		     		$d_usr->segundo_apellido=$request['usuarios'][0]['segundo_apellido'];
		     		$d_usr->save();

					// hago la insercion de los roles que se le asignen al usuario
		     		foreach ($request['role_user'] as $role_id) {

		     			DB::table('role_users')->insert(
		     				[
		     					'role_id' => $role_id['id'],
		     					'user_id' => $iduser[0]->id,
		     					'created_at'=>now(),
		     					'updated_at'=>now()
		     				]);
		     		}
		     		$mensaje="Se ha insertado el nuevo usuario satisfactoriamente";
		     		DB::commit();
		     	}
		     	return response()->json(
		     		[
		     			"errores"=>$error,
		     			"data"=>$datausr,
		     			"role_user"=>$role_user,
		     			"mensaje"=>$mensaje,
		     			"status"=>200
		     		]);

     		} catch(\Illuminate\Database\QueryException $ex){
     			dd($ex->getMessage());
     		}
    }

    public function update(Request $request , User $id)
    {
    	$mensaje ='';
    	try {
    		$datausr['email']=$request['usuarios'][0]['email'];
	     	$datausr['primer_nombre']=$request['usuarios'][0]['primer_nombre'];
	     	$datausr['segundo_nombre']=$request['usuarios'][0]['segundo_nombre'];
	     	$datausr['primer_apellido']=$request['usuarios'][0]['primer_apellido'];
	     	$datausr['segundo_apellido']=$request['usuarios'][0]['segundo_apellido'];
	     	$datausr['tipo_documento_id']=$request['usuarios'][0]['tipo_documento_id'];
	     	$datausr['numero_documento']=$request['usuarios'][0]['numero_documento'];
	     	$datausr['password']=$request['usuarios'][0]['password'];

	     	$role_user = $request['role_user'];
    		DB::beginTransaction();
    		// hago la actualizacion de usuario
    		$id->name='internal';
     		$id->email=$request['usuarios'][0]['email'];
     		$id->password=bcrypt($request['usuarios'][0]['password']);
     		$id->save();

     		//actualizo el detalle del usuario

     		DB::table('user_details')
		    ->where('user_id', $id->id)
		    ->update(
		    	[
		    		'user_id' => $id->id,
		    		'numero_documento' => $request['usuarios'][0]['numero_documento'],
		    		'primer_nombre' => $request['usuarios'][0]['primer_nombre'],
		    		'segundo_nombre' => $request['usuarios'][0]['segundo_nombre'],
		    		'primer_apellido' => $request['usuarios'][0]['primer_apellido'],
		    		'segundo_apellido' => $request['usuarios'][0]['segundo_apellido'],
		        ]);
		    	//elimino los roles del usuaio para insertar los nuevos
		    	DB::table('role_users')->where('user_id', '=', $id->id)->delete();
		    	// inserto los nuevos roles
		    	foreach ($request['role_user'] as $role_id) {

		     			DB::table('role_users')->insert(
		     				[
		     					'role_id' => $role_id['id'],
		     					'user_id' => $id->id,
		     					'created_at'=>now(),
		     					'updated_at'=>now()
		     				]);
		     		}
		     		$mensaje= 'El usuario se ha actualizado correctamente';

		 	DB::commit();
		 	return response()->json(
		     		[
		     			"data"=>$datausr,
		     			"role_user"=>$role_user,
		     			"mensaje"=>$mensaje,
		     			"status"=>201
		     		]);
		} catch(\Illuminate\Database\QueryException $ex){
		  dd($ex->getMessage());
		}
    }

    public function delete(User $id)
    {
    	DB::beginTransaction();
    	DB::table('role_users')->where('user_id', '=', $id->id)->delete();
    	DB::table('user_details')->where('user_id', '=', $id->id)->delete();
    	$id->delete();
    	DB::commit();
    	return response()->json(
      [
         "mensaje"=>"Se elimino el usuario Correctamente"
      ]);
    }




}
