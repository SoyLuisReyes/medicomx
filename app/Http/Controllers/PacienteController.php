<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('paciente.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $medicos = Doctor::all();
        return view('paciente.create', compact('medicos'));

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
            'direccion' => 'required',
            'edad' => 'required',
            'padecimiento' => 'required',
            'medico' => 'required',
            'medicamento' => 'required',
            'fecha' => 'required'
        ]);

            //almacenar en la base de datos sin modelo
            DB::table('pacientes')->insert([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'direccion' => $data['direccion'],
            'edad' => $data['edad'],
            'padecimiento' => $data['padecimiento'],
            'doctors_id' => $data['medico'],
            'medicamento' => $data['medicamento'],
            'fecha' => $data['fecha'],
        ]);

        // redireccion
        return redirect()->action('PacienteController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        $medicos = Doctor::all();
        return view('paciente.edit', compact('paciente', 'medicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
                //validacion
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'edad' => 'required',
            'padecimiento' => 'required',
            'medico' => 'required',
            'medicamento' => 'required',
            'fecha' => 'required'
        ]);

        $paciente->nombre = $data['nombre'];
        $paciente->apellido = $data['apellido'];
        $paciente->direccion = $data['direccion'];
        $paciente->edad = $data['edad'];
        $paciente->padecimiento = $data['padecimiento'];
        $paciente->doctors_id = $data['medico'];
        $paciente->medicamento = $data['medicamento'];
        $paciente->fecha = $data['fecha'];
        $paciente->save();

        // redireccion
        return redirect()->action('PacienteController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        // redireccion
        return redirect()->action('PacienteController@index');
    }
}
