@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row d">
        <div class="col-6"><h2 class="text-light fs-1">Tu Carrito</h2></div>
        <div class="col-6 text-light" style="padding-left: 10.5em;">
            <div class="row">
                <div class="col">
                    <h1>Resumen</h1>
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('comprar')}}" class="btn btn-warning fs-3">Comprar</a>
                </div>
            </div>    
        
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            @foreach($arrayCarrito as $objetoProducto)
                <div class="row rounded-3 p-3 mt-3 standardBackgroundColor text-light">
                    <div class="col"><img src="{{ asset('./storage/'.$objetoProducto->imagen) }}" alt="" width="100" height="150"></div>
                    <div class="col d-flex align-items-center justify-content-center standardBackgroundColor">{{ $objetoProducto->nombre }}</div>
                    <div class="col d-flex align-items-center justify-content-center standardBackgroundColor">${{ $objetoProducto->precio }}</div>
                    <div class="col d-flex align-items-center justify-content-end standardBackgroundColor"><a href=" {{ route('productoscli.delete', $objetoProducto) }} "><img src="{{ asset('/img/eliminar.png') }}" alt="quitar" weight="20" height="40"></b></button></a></div>
                </div>
            @endforeach
        </div>
        <div class="col-6 container">
                    <div style="margin-top:1em; margin-left: 10em; color: white; border: ridge 2px white;">
                        
                        <table>
                            <thead>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr id="totalPedido" style="text-align:center;">
                                    <td class="font-weight-bold p-3 fs-2"><strong>Total Pedido:</strong></td>
                                    <td class="font-weight-bold p-3 fs-2">
                                        <strong>
                                            @if(isset($totalAPagar))
                                                ${{ $totalAPagar}}
                                            @else
                                                ${{ 0 }}    
                                            @endif
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                            <div class="p-2 p-lg-3 border align-content-center">
                                <label for="c_code" class="text-white mb-3">¿Tienes un código de descuento? --> PROXIMAMENTE</label>
                                <div class="input-group w-75">
                                  <input type="text" class="form-control" placeholder="Código de Descuento (MUY PRONTO)" aria-label="Coupon Code" aria-describedby="button-addon2" disabled>
                                  <div class="input-group-append">
                                    <button class="btn btn-warning" type="button" id="button-addon2" disabled>Aplicar</button>
                                  </div>
                                </div>
                            </div class="card">

                                <h2 style="margin-left: 1em;" class="p-3">Formas de Pago</h2>
                                <p style="margin-left: 3em;">Seleccione su forma de pago</p>
                                
                                <div>
                                <div class="border p-3 mb-3">
                                        
                                    <h3 class="h6 mb-0"><a class="d-block card-header" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank"><img src="{{ asset('/img/transfer.png') }}" alt="" width="15%" style="margin-right: 1em;">Transferencia Bancaria</a></h3>
                                        <div class="collapse" id="collapsebank">
                                          <div class="py-2">
                                            <p class="mb-0">Realice su transferencia y envie el comprobante por e-mail. El pedido quedará confirmado una vez verificado el pago.</p>
                                            <p class="mb-0">Banco Santander <br> Cuenta Corriente 12234567 <br> Alias: HOLA.SOY.CUENTA <br> CUIT: 30-56452134-1 <br> E-Mail: info@lagproject.com</p>
                                          </div>
                                        </div>
                                      </div>


                              <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0"><a class="d-block card-header" data-toggle="collapse" href="http://www.mercadopago.com.ar" role="button" aria-expanded="false" aria-controls="collapsemp"><img src="{{ asset('/img/mp.webp') }}" alt="" width="15%" style="margin-right: 1em;">Mercado Pago (Tarjetas)</a></h3>
                              </div>

                              <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0"><a class="d-block card-header" data-toggle="collapse" href="http://www.paypal.com" role="button" aria-expanded="false" aria-controls="collapsepaypal"><img src="{{ asset('/img/paypal.png') }}" alt="" width="15%" style="margin-right: 1em;">PayPal</a></h3>
                              </div>
                            </div>
                    </div>
                </div>
    </div>
    
</div>








@endsection