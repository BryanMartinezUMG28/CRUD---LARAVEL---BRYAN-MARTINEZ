<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Listado
Route::get('/', 'UserController@list'); 

//Formulario para los usuarios
Route::get('/form','UserController@userform');
//Para guardar los usuarios
Route::match(['get','post'], '/save','UserController@save')->name('save');
