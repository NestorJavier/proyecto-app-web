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

Route::resource('usuario', 'UserController')->middleware('auth'); //En las rutas

Route::resource('evento', 'EventoController')->middleware('auth'); //En las rutas

Route::resource('career', 'CareerController')->middleware('auth'); //En las rutas

Route::resource('subject', 'SubjectController')->middleware('auth'); //En las rutas

Route::resource('course', 'CourseController')->middleware('auth'); //En las rutas

Route::resource('exam', 'ExamController')->middleware('auth'); //En las rutas

Route::get('/home', 'HomeController@index')->name('home');
