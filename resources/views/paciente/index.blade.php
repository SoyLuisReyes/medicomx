@extends('layouts.app')

@section('content')

<div class="container">
    <button type="button" class="btn btn-outline-primary" data-mdb-ripple-color="dark">
        <a href="{{ route('pacientes.create')}}">Regresar</a>
      </button>
    <h1  class="text-center mb-5">Lista de Pacientes</h1>

    <table class="table table-bordered">
        <thead>
          <tr>

            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Direccion</th>
            <th scope="col">Edad</th>
            <th scope="col">Padecimiento</th>
            <th scope="col">Doctor</th>
            <th scope="col">Medicamento</th>
            <th scope="col">Fecha</th>
            <th colspan="2" class="text-center">Acciones</th>
          </tr>
        </thead>

        @foreach ($pacientes as $paciente)
            <tbody>
                <tr>
                    <td>{{ $paciente->nombre }}</td>
                    <td>{{ $paciente->apellido }}</td>
                    <td>{{ $paciente->direccion }}</td>
                    <td>{{ $paciente->edad }}</td>
                    <td>{{ $paciente->padecimiento }}</td>
                    <td>{{ $paciente->doctor->nombre}}</td>
                    <td>{{ $paciente->medicamento }}</td>
                    <td>{{ $paciente->fecha }}</td>
                    <td>
                        <div class="btn-group" role="group" >

                            <form action="{{ route('pacientes.destroy', ['paciente' => $paciente->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger  d-block mb-2" value="Eliminar">
                            </form>


                            <a href="{{ route('pacientes.edit', ['paciente' => $paciente->id])}}" class="btn btn-dark  d-block mb-2">Editar</a>

                        </div>
                    </td>
                </tr>
            </tbody>
        @endforeach

      </table>

</div>

@endsection
