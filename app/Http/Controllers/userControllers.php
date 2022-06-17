<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userControllers extends Controller
{
    public function index()
    {
    	return view('usuarios.usuarios');
    }

    public function store(Request $request)
    {
    	return view('usuarios.usuarios');
    }
}
