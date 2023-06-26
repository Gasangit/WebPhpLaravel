@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-3 mb-4">
            <div class="card cardBackground">
                <br>
                <img class="card-img-top" src="{{ asset('/img/' . 'alejandro.jpg') }}" alt="ale" width="200" height="300">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title text-light cardH3 text-center">Alejandro Solodujin</h3>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card cardBackground">
                <br>
                <img class="card-img-top" src="{{ asset('/img/' . 'lucas.jpg') }}" alt="ale" width="200" height="300">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title text-light cardH3 text-center">Lucas Marenco</h3>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card cardBackground">
                <br>
                <img class="card-img-top" src="{{ asset('/img/' . 'gaston.jpg') }}" alt="ale" width="200" height="300">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title text-light cardH3 text-center">Gaston Mansilla</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 text-light fs-5 d-flex justify-content-center">
        <div class="col-6">
            <p>
            Infinity Group nació en el primer cuatrimestre de la cursada de Analista de Sistemas, en la cual iniciamos la marca para la materia Comunicación Visual y fuimos extendiéndola en diferentes materias.
            </p>
            <p>
            En esta ocasión creamos el “LAG PROJECT” dedicado a un proyecto Web Gamer. Su nombre “LAG” proviene de las iniciales de los nombres de sus integrantes (LucasAlejandroGaston) y su propósito fue centrado en el mundo gamer, donde las siglas “lag” tienen correlación al lag generado al jugar.
            </p>
        </div>
    </div>
</div>
@endsection