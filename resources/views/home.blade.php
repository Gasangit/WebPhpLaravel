@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Carousel -->
    <div class="container">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/juego1.jpg" alt="cursopersonalizado" class="d-block justify-center" width="100%"
                        height="650">
                    <div class="carousel-caption">
                        <h3 id="h1index"></h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/juego2.jpg" alt="SAPBO" class="d-block justify-center" width="100%" height="650">
                    <div class="carousel-caption">
                        <h3 id="h1index"></h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/juego3.jpg" alt="capacitate" class="d-block" width="100%" height="650">
                    <div class="carousel-caption">
                        <h1 id="h1index">
                            </h3>
                    </div>
                </div>
            </div>
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <div class="row mt-5">
        <h2 class="text-light">OFERTAS</h2>
        <HR></HR>
    </div>
    <div class="row mt-3">
        @foreach($productos as $juego)
        @if($juego->en_oferta == 1)
        <div class="col-3 mb-4">
            <a href="{{ route('productoscli.show', $juego) }}">
                <div class="card cardBackground">
                    <br>
                    <img class="card-img-top" src="{{ asset('/storage/' . $juego->imagen) }}"
                        alt="{{$juego->descripcion}}" width="200" height="300">
                    <div class="card-body d-flex flex-column">
                        <hr class="text-light">
                    </div>
                </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>


    <div class="row mt-5">
        <h2 class="text-light">PC</h2>
    </div>
    <div class="row mt-3">

        @php
        $count = 1;
        @endphp

        @foreach($productos as $juego)

        @if($juego->categoria_id == 1 and $count < 5) @php $count +=1;@endphp 
        <div class="col-3 mb-4">
            <a href="{{ route('productoscli.show', $juego) }}">
                <div class="card cardBackground">
                    <br>
                    <img class="card-img-top" src="{{ asset('./storage/' . $juego->imagen) }}"
                        alt="{{$juego->descripcion}}" width="200" height="300">
                    <div class="card-body d-flex flex-column">
                        <hr class="text-light">

                    </div>
                </div>
        </a>
    </div>
    @endif
    @endforeach
</div>

<div class="row mt-5">
    <h2 class="text-light">XBOX</h2>
</div>
<div class="row mt-3">
    @php
    $count = 1;
    @endphp

    @foreach($productos as $juego)
    @if($juego->categoria_id == 2 and $count < 5) @php $count +=1;@endphp 
        <div class="col-3 mb-4">
        <a href="{{ route('productoscli.show', $juego) }}">
            <div class="card cardBackground">
                <br>
                <img class="card-img-top" src="{{ asset('/storage/' . $juego->imagen) }}" alt="{{$juego->descripcion}}"
                    width="200" height="300">
                <div class="card-body d-flex flex-column">
                    <hr class="text-light">

                </div>
            </div>
        </a>
</div>
@endif
@endforeach
</div>

<div class="row mt-5">
    <h2 class="text-light">PLAYSTATION</h2>
</div>
<div class="row mt-3">
    @php
    $count = 1;
    @endphp

    @foreach($productos as $juego)

    @if($juego->categoria_id == 3 and $count < 5) @php $count +=1;@endphp <div class="col-3 mb-4">
        <a href="{{ route('productoscli.show', $juego) }}">
            <div class="card cardBackground">
                <br>
                <img class="card-img-top" src="{{ asset('/storage/' . $juego->imagen) }}" alt="{{$juego->descripcion}}"
                    width="200" height="300">
                <div class="card-body d-flex flex-column">
                    <hr class="text-light">
                </div>
            </div></a>
</div>
@endif
@endforeach
</div>


<div class="row mt-5">
    <h2 class="text-light">SWITCH</h2>
</div>
<div class="row mt-3">
    @php
    $count = 0;
    @endphp

    @foreach($productos as $juego)

    @if($juego->categoria_id == 4 and $count < 5) @php$count +=1;@endphp <div class="col-3 mb-4">
        <a href="{{ route('productoscli.show', $juego) }}">
            <div class="card cardBackground">
                <br>
                <img class="card-img-top" src="{{ asset('/storage/' . $juego->imagen) }}" alt="{{$juego->descripcion}}"
                    width="200" height="300">
                <div class="card-body d-flex flex-column">
                    <hr class="text-light">
                    
                </div>
            </div></a>
</div>
@endif
@endforeach
</div>
</div>
@endsection