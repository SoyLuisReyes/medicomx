@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h1 class="text-center mb-5">Nuevo Doctor</h1>

            <form action="{{ route('doctores.store')}}" enctype="multipart/form-data" method="post" novalidate class="border p-3 form">
                @csrf
              <div class="form-group">
                <label for="text">Nombre</label>
                <input type="text" name="nombre"
                        id="nombre"
                        class="form-control @error('nombre') is-invalid @enderror"
                        placeholder="Nombre del Medico"
                        value={{ old('nombre')}}>

                @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror

              </div>

              <div class="form-group">
                <label for="text">Apellido</label>
                <input type="text" name="apellido"
                        class="form-control @error('apellido') is-invalid @enderror"
                        placeholder="Apellido del Medico"
                        value={{ old('apellido')}}>

                    @error('apellido')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
              </div>

              <div class="form-group">
                <label for="text">Cedula Profesional</label>
                <input type="text" name="cedula"
                        class="form-control @error('cedula') is-invalid @enderror"
                        placeholder="Cedula profesional del Medico"
                        value={{ old('cedula')}}>


                        @error('cedula')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
              </div>


              <div class="form-group">
                <label for="text">Especialidad</label>
                <input type="text" name="especialidad"
                        class="form-control @error('especialidad') is-invalid @enderror"
                        placeholder="Especialidad del medico"
                        value={{ old('especialidad')}}>

                        @error('especialidad')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar Medico">
              </div>
            </form>
          </div>
    </div>

@endsection
