@extends('layouts.app')

@section('content')

<div class="container">
    <button type="button" class="btn btn-outline-primary" data-mdb-ripple-color="dark">
        <a href="{{ route('pacientes.create')}}">Regresar</a>
      </button>

      <button type="button" class="btn btn-outline-primary" data-mdb-ripple-color="dark">
        <a href="{{ route('doctores.create')}}">Agregar Medico</a>
      </button>
    <h1  class="text-center mb-5">Lista de Medicos</h1>

    <table class="table table-bordered">
        <thead>
          <tr>

            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Cedula</th>
            <th scope="col">Especialidad</th>
            <th colspan="2" class="text-center">Acciones</th>
          </tr>
        </thead>

        @foreach ($doctores as $doctor)
            <tbody>
                <tr>
                    <td>{{ $doctor->nombre }}</td>
                    <td>{{ $doctor->apellido }}</td>
                    <td>{{ $doctor->cedula }}</td>
                    <td>{{ $doctor->especialidad }}</td>
                    {{-- <td class="text-center">Eliminar</td>
                    <td class="text-center">Editar</td> --}}
                    <td>
                        <div class="btn-group" role="group" >

                            <form action="{{ route('doctores.destroy', ['doctor' => $doctor->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger  d-block mb-2" value="Eliminar">
                            </form>

                            {{-- <button type="button" class="btn btn-primary">Editar</button> --}}
                            <a href="{{ route('doctores.edit', ['doctor' => $doctor->id])}}" class="btn btn-dark  d-block mb-2">Editar</a>
                            {{-- <a href="" class="btn btn-danger  d-block mb-2">Eliminar</a> --}}
                        </div>
                    </td>
                </tr>
            </tbody>
        @endforeach

      </table>
</div>

@endsection
