@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        @foreach($productos as $objetoProducto)
        <div class=" col-12 mx-2 mx-md-0 col-md-3 mb-4">
            <a class="eliminarLink" href="{{ route('productoscli.show', $objetoProducto) }}">
                <div class="card cardBackground">
                    <br>

                    <img class="card-img-top" src="{{ asset('/storage/' . $objetoProducto->imagen) }}"
                        alt="{{$objetoProducto->descripcion}}" width="200" height="300">

                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title text-light cardH3">{{$objetoProducto->nombre}}</h3>
                        <p class="card-text text-light cardParagraph">{{$objetoProducto->descripcion}}</p>
                        <hr class="text-light">
                        <div class="row">
                            <div class="col text-light fs-3">
                                ${{ $objetoProducto->precio}}
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        @endforeach
    </div>
</div>
@endsection