@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card formulario text-light">
                    <div class="card-header mt-2 fs-3">{{ $producto->nombre }}</div>

                    <div class="card-body">

                        <form class="m-3" method="POST" action="{{ route('productos.update', $producto) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nombre" class="form-label"> Nombre </label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del juego" value="{{ $producto->nombre }}">
                                @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="desarrollador" class="form-label"> Desarrollador </label>
                                <input type="text" class="form-control" id="desarrollador" name="desarrollador" placeholder="Ingrese el desarrollador del juego" value="{{ $producto->desarrollador }}">
                                @error('desarrollador')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="lanzamiento" class="form-label"> Año de Lanzamiento </label>
                                <input type="number" class="form-control" id="lanzamiento" name="lanzamiento" placeholder="Ingrese el año de lanzamiento del juego" value="{{ $producto->lanzamiento }}">
                                @error('lanzamiento')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="genero" class="form-label"> Género </label>
                                <input type="text" class="form-control" id="genero" name="genero" placeholder="Ingrese el genero del juego" value="{{ $producto->genero }}">
                                @error('genero')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label"> Descripción del Juego </label>
                                <textarea class="form-control" id="descripcion" rows="3" name="descripcion" placeholder="Ingrese la descripcion del juego">{{ $producto->descripcion }}</textarea>
                                @error('descripcion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="categoria_id" class="form-label"> Categoría </label>
                                <select class="form-control" name="categoria_id" id="categoria_id">
                                    <option value=""> Seleccione la categoría </option>
                                    @foreach ($categorias as $cat)
                                        <option @if($cat->id == $producto->categoria_id) selected @endif value="{{ $cat->id }}"> {{ $cat->nombre }} </option>
                                    @endforeach
                                </select>
                                @error('categoria_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label"> Precio </label>
                                <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio del juego" value="{{ $producto->precio }}">
                                @error('precio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="en_oferta" class="form-label"> ¿En Oferta? </label>
                                
                                <select class="form-control" name="en_oferta" id="en_oferta">
                                    <option value="1" @if($producto->en_oferta == 1) selected @endif>En oferta</option>
                                    <option value="0" @if($producto->en_oferta == 0) selected @endif>Precio base</option>
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
                            <button type="submit" class="btn btn-success"> Modificar </button>
                            <a class="btn btn-danger" href="{{ route('productos.index') }}"> Cancelar </a>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
