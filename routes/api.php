<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::get('cat','CatController@index')->name('cat');

// Route::get('cat/{id}','CatController@show')->name('cat');

// Route::post('cat','CatController@store')->name('cat');

// Route::put('cat/{id}','CatController@update')->name('cat');
// Route::delete('cat/{id}','CatController@delete')->name('cat');

// Centros de Atencion Tutorial CAT
Route::get('cats','CatsControllers@index')->name('cats');
Route::get('cats/{id}','CatsControllers@show')->name('cats');
Route::post('cats','CatsControllers@store')->name('cats');
Route::put('cats/{id}','CatsControllers@update')->name('cats');
Route::delete('cats/{id}','CatsControllers@delete')->name('cats');

//Municipios
Route::get('vermuni/{id}','MunicipioController@show')->name('vermuni');

//Programas

Route::get('programas','ProgramasController@index')->name('programas');
Route::get('programas/{id}','ProgramasController@show')->name('programas');
Route::post('programas','ProgramasController@store')->name('programas');
Route::put('programas/{id}','ProgramasController@update')->name('programas');
Route::delete('programas/{id}','ProgramasController@delete')->name('programas');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
