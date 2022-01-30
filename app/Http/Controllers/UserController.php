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
			return $usuario = BD::table('users')
			->join('users_detail');
 
		} catch(\Illuminate\Database\QueryException $ex){ 
			dd($ex->getMessage()); 
		}
	}
}
