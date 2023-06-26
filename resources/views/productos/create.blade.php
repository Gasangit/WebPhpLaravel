@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card formulario text-light">
                    <div class="card-header mt-2 fs-3">{{ __('Juego nuevo') }}</div>

                    <div class="card-body">

                        <form class="m-3" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label"> Nombre </label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del juego" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="desarrollador" class="form-label"> Desarrollador </label>
                                <input type="text" class="form-control" id="desarrollador" name="desarrollador" placeholder="Ingrese el desarrollador del juego" value="{{ old('desarrollador') }}">
                                @error('desarrollador')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="lanzamiento" class="form-label"> Año de Lanzamiento </label>
                                <input type="number" class="form-control" id="lanzamiento" name="lanzamiento" placeholder="Ingrese el año de lanzamiento del juego" value="{{ old('lanzamiento') }}">
                                @error('lanzamiento')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="genero" class="form-label"> Género </label>
                                <input type="text" class="form-control" id="genero" name="genero" placeholder="Ingrese el genero del juego" value="{{ old('genero') }}">
                                @error('genero')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label"> Descripción del Juego </label>
                                <textarea class="form-control" id="descripcion" rows="3" name="descripcion" placeholder="Ingrese la descripcion del juego" value="{{ old('descripcion') }}"></textarea>
                                @error('descripcion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="categoria_id" class="form-label"> Categoría </label>
                                <select class="form-control" name="categoria_id" id="categoria_id">
                                    <option value=""> Seleccione la categoría </option>
                                    @foreach ($categorias as $cat)
                                        <option @if($cat->id == old('categoria_id')) selected @endif value="{{ $cat->id }}"> {{ $cat->nombre }} </option>
                                    @endforeach
                                </select>
                                @error('categoria_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label"> Precio </label>
                                <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio del juego" value="{{ old('precio') }}">
                                @error('precio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="en_oferta" class="form-label"> ¿En Oferta? </label>
                                
                                <select class="form-control" name="en_oferta" id="en_oferta">
                                    <option value="1">En oferta</option>
                                    <option value="0">Precio base</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label"> IMAGEN </label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                                @error('imagen')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="video" class="form-label"> VIDEO </label>
                                <input type="text" class="form-control" id="video" name="video" placeholder="Ingrese el url del video" value="{{ old('video') }}">
                                @error('video')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success"> Crear </button>
                            <a class="btn btn-danger" href="{{ route('productos.index') }}"> Cancelar </a>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
