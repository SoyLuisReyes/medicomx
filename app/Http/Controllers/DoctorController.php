<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $doctores = Doctor::all();
        return view('doctor.index',compact('doctores'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'especialidad' => 'required'
        ]);

               //almacenar en la base de datos sin modelo
        DB::table('doctors')->insert([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'cedula' => $data['cedula'],
            'especialidad' => $data['especialidad'],
        ]);

        // redireccion
        return redirect()->action('DoctorController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //validacion
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'especialidad' => 'required'
        ]);

        $doctor->nombre = $data['nombre'];
        $doctor->apellido = $data['apellido'];
        $doctor->cedula = $data['cedula'];
        $doctor->especialidad = $data['especialidad'];

        $doctor->save();

        // redireccion
        return redirect()->action('DoctorController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        // redireccion
        return redirect()->action('DoctorController@index');
    }
}
