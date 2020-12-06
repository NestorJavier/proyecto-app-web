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

Route::get('/', function () {
    return view('landing');
})->middleware('guest');

Auth::routes();

Route::resource('evento', 'EventoController')->middleware('auth'); //En las rutas

Route::resource('Career', 'CareerController')->middleware('auth'); //En las rutas

Route::get('/home', 'HomeController@index')->name('home');
