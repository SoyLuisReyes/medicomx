@extends('layouts.app')


@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            
            <h1 class="text-center mb-5">Editar Paciente</h1>
            <form action="{{ route('pacientes.update',['paciente' => $paciente->id])}}" method="post" novalidate class="border p-3 form">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label for="text">Nombre</label>
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                        id="nombre"
                        placeholder="Nombre del Paciente"
                        value="{{$paciente->nombre}}">

                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
              </div>

              <div class="form-group">
                <label for="text">Apellido</label>
                <input type="text" name="apellido"  class="form-control @error('apellido') is-invalid @enderror"
                        id="apellido"
                        placeholder="Apellido del Paciente"
                        value="{{$paciente->apellido}}">

                    @error('apellido')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
              </div>

                <div class="form-group">
                    <label for="text">Direccion</label>
                    <input type="text" name="direccion"
                            class="form-control @error('direccion') is-invalid @enderror"
                            id="apellido"
                            placeholder="Apellido del Paciente"
                            value="{{$paciente->direccion}}"
                        >

                    @error('direccion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>


              <div class="form-group">
                <label for="text">Edad</label>
                <input type="number" id="edad" name="edad" class="form-control  @error('edad') is-invalid @enderror"
                        value="{{$paciente->edad}}"
                >

                    @error('edad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
              </div>

              <div class="form-group">
                <label for="text">Padecimiento</label>
                <textarea style="resize:none;"  name="padecimiento"
                            id="padecimiento" cols="10" rows="6"
                            class="form-control @error('padecimiento') is-invalid @enderror"

                >{{$paciente->padecimiento}}</textarea>

                @error('padecimiento')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="text">Medico</label>
                <select name="medico" class="form-control @error('medico') is-invalid @enderror"  id="medico" >
                    <option  disabled selected>--Seleccione--</option>
                        @foreach ($medicos as $medico)
                            <option value="{{ $medico->id }}" {{  $paciente->doctors_id == $medico->id ? 'selected' : ''}}> {{ $medico->nombre }} </option>
                        @endforeach
                </select>


                @error('medico')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

              </div>

              <div class="form-group">
                <label for="text">Medicamento</label>
                <input type="text"  name="medicamento" id="medicamento"
                        class="form-control @error('medicamento') is-invalid @enderror"
                        value="{{$paciente->medicamento}}"
                        >


                @error('medicamento')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="text">Fecha</label>
                <input type="date"  name="fecha" id="fecha"
                        class="form-control @error('medicamento') is-invalid @enderror"
                        value="{{$paciente->fecha}}"
                        >


                    @error('fecha')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Editar Paciente">
              </div>
            </form>
          </div>
    </div>
@endsection


