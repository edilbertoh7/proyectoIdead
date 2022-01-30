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

// cursos
Route::get('cursos','CursosController@index')->name('cursos');
Route::get('cursos/{id}','CursosController@show')->name('cursos');
Route::post('cursos','CursosController@store')->name('cursos');
Route::put('cursos/{id}','CursosController@update')->name('cursos');
Route::delete('cursos/{id}','CursosController@delete')->name('cursos');

// usuarios
Route::get('usuarios','UserController@index')->name('usuarios');
Route::get('usuarios/{id}','UserController@show')->name('usuarios');
Route::post('usuarios','UserController@store')->name('usuarios');
Route::put('usuarios/{id}','UserController@update')->name('usuarios');
Route::delete('usuarios/{id}','UserController@delete')->name('usuarios');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
