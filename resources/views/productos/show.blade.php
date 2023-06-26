@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card formulario text-light">
                <div class="card-header mt-2 fs-3">{{ $producto->nombre }}</div>
                <div class="card-body">
                   <img class="imagen-producto" src="{{ asset('/storage/'.$producto->imagen) }}" alt="imagen juego"> 
                    <p class="d-inline">Descripción: </p>{{ $producto->descripcion }}
                    <br>
                    <p class="d-inline">Desarrollador: </p>{{ $producto->desarrollador }}
                    <br>
                    <p class="d-inline">Año de Lanzamiento: </p>{{ $producto->lanzamiento }}
                    <br>
                    <p class="d-inline">Género: </p>{{ $producto->genero }}
                    <br>
                    <p class="d-inline">Plataforma: </p>{{ $producto->categoria->nombre }}
                    <br>
                    <p class="d-inline">Precio: </p>{{ $producto->precio_format() }}
                    <br>
                    <hr>
                    <a class="btn btn-primary" href="{{ route('productos.index') }}"> Volver a juegos </a>
                    <a class="btn btn-success" href="{{ route('productos.edit', $producto) }}"> Editar juego </a>
                    <form id="form-delete" class="d-inline" method="POST" action="{{ route('productos.destroy', $producto) }}">
                        @csrf
                        @method('DELETE')
                        <button id="form-submit" class="btn btn-danger" type="submit"> Inactivar/Activar Juego </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Scripts -->
    @vite(['resources/js/productos/show.js'])
@endsection