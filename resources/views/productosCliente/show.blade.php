@extends('layouts.app')

@section('content')
   
    <div class="container">
        <div class="row rounded-3 p-1 mx-5 standardBackgroundColor text-light">
            <div class="col-md-6 text-center my-auto">
                <div class="row mx-1">
                    <div class="col-12 mb-5"><h2> {{ $objetoProducto->nombre }} </h2></div>
                    <!-- <div class="col-12 my-3"><h3 class="fs-6"> PC </h3></div> -->
                </div>
                <div class="row mx-1">
                    <div class="col-6 mx-auto">
                        <img class="rounded-3" src="{{ asset('/storage/' . $objetoProducto->imagen) }}" alt="{{ $objetoProducto->nombre}}" width="282.1" height="350">
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-4">
                <div class="row mx-5 rounded-3 mb-3">
                    <iframe width="350" height="210" src="{{ $objetoProducto->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="row mx-5">
                    <p class="fs-6">{{$objetoProducto->descripcion}}</p>
                </div>
                <div class="row mx-5">
                    <div class="col-6 fs-6"><label for="infoDesarrollador">Desarrollador :</label><p id="infoDesarrollador"> {{ $objetoProducto->desarrollador }} </p></div>
                    <div class="col-6 fs-6"><label for="infoLanzamiento">Lanzamiento :</label><p id="infoLanzamiento"> {{$objetoProducto->lanzamiento}} </p></div>
                    
                </div>
                <div class="row mx-5">
                    <div class="col-6 fs-6"><label for="infoGenero">Genero :</label><p id="infoGenero">          {{$objetoProducto->genero}} </p></div>
                    <div class="col-6 fs-6"><label for="infoPrecio">Precio :</label><p id="infoPrecio">${{$objetoProducto->precio}} </p></div>
                </div>
                <div class="row mx-5 rounded-3 d-flex align-items-center p-3">
                    <a href="{{ route('productoscli.create', $objetoProducto) }}" class="btn btn-warning text-dark" style="font-weight: bold;"> 
                        <img src="{{ asset('/img/carroblack.png') }}" alt="usuario" weight="10" height="20" style="margin-right:1em;"> Agregar al Carrito</a>
                </div>
            </div>
        </div>
    </div>
@endsection