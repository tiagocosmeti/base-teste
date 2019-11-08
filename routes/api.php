<?php

use Illuminate\Http\Request;

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

Route::post('/', 'ImoveisController@criar');
Route::get('/', 'ImoveisController@exibir');
Route::put('/{id}', 'ImoveisController@atualizar');
Route::delete('/{id}', 'ImoveisController@deletar');
