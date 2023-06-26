@extends('layouts.app')

@section('content')

 <div class="container"> 
    <div class="row d-flex justify-content-center containerCompra text-light">
        <div class="col text-center">
           <h1 style="margin-left: 1em;"><img src="{{ asset('/img/check.png') }}" alt="confirmado" width="3%">   <strong>Pedido Confirmado</strong></h1>
        </div>
    </div>
    <div class="row d-flex justify-content-center text-light mt-5">
        <div class="col-6 text-center">
            <p class="fs-3">Su pedido se ha procesado con exito. Se le enviará las instrucciones para descargar el juego a su correo electrónico una vez se haya verificado el pago</p>
        </div>
    </div>

</div>

@endsection