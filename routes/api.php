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
Route::get('cat','CatController@index')->name('cat');

Route::get('cat/{id}','CatController@show')->name('cat');

Route::post('cat','CatController@store')->name('cat');

Route::put('cat/{id}','CatController@update')->name('cat');
Route::delete('cat/{id}','CatController@delete')->name('cat');

Route::get('vermuni/{id}','MunicipioController@show')->name('vermuni');

Route::get('cats','CatsControllers@index')->name('cats');
Route::get('cats/{id}','CatsControllers@show')->name('cats');
Route::post('cats','CatsControllers@store')->name('cats');
Route::put('cats/{id}','CatsControllers@update')->name('cats');
Route::delete('cats/{id}','CatsControllers@delete')->name('cats');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
