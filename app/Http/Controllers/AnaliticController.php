<?php

namespace App\Http\Controllers;

use App\Analitics;
use App\Roles;
use Illuminate\Http\Request;

class AnaliticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Analitics::all('id','token','dashboard');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Analitics  $analitics
     * @return \Illuminate\Http\Response
     */
    public function show(Analitics $id)
    {
        return  Analitics::all('id','token','dashboard')->where('id',$id->id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analitics  $analitics
     * @return \Illuminate\Http\Response
     */
    public function edit(Analitics $analitics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Analitics  $analitics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analitics $analitics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Analitics  $analitics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analitics $analitics)
    {
        //
    }
}
