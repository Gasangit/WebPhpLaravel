@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card formulario text-light">
                    <div class="card-header mt-2 fs-3">{{ __('Consola nueva') }}</div>

                    <div class="card-body">

                        <form class="m-3" method="POST" action="{{ route('categorias.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label"> Nombre de Consola </label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la consola" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label"> Descripción de Consola </label>
                                <textarea class="form-control" id="descripcion" rows="3" name="descripcion" placeholder="Ingrese la descripcion de la consola" value="{{ old('descripcion') }}"></textarea>
                                @error('descripcion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
  
                            <button type="submit" class="btn btn-success"> Crear </button>
                            <a class="btn btn-danger" href="{{ route('categorias.index') }}"> Cancelar </a>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
