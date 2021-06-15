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
    return view('auth.login');
    // return view('paciente.create');
});

Auth::routes();

//RUTAS DE PACIENTES
Route::get('/pacientes', 'PacienteController@index')->name('pacientes.index');

Route::get('/pacientes/create', 'PacienteController@create')->name('pacientes.create');
Route::post('/pacientes', 'PacienteController@store')->name('pacientes.store');
Route::get('/pacientes/{paciente}/edit', 'PacienteController@edit')->name('pacientes.edit');
Route::put('/pacientes/{paciente}', 'PacienteController@update')->name('pacientes.update');

Route::delete('/pacientes/{paciente}', 'PacienteController@destroy')->name('pacientes.destroy');


//RUTAS DE DOCTOR
Route::get('/doctores', 'DoctorController@index')->name('doctores.index');
Route::get('/doctores/create', 'DoctorController@create')->name('doctores.create');
Route::post('/doctores', 'DoctorController@store')->name('doctores.store');
Route::get('/doctores/{doctor}/edit', 'DoctorController@edit')->name('doctores.edit');
Route::put('/doctores/{doctor}', 'DoctorController@update')->name('doctores.update');
Route::delete('/doctores/{doctor}', 'DoctorController@destroy')->name('doctores.destroy');


// Route::get('/home', 'HomeController@index')->name('home');
