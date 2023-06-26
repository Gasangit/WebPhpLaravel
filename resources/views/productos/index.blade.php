@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card formulario text-light">
                    <div class="card-header formulario text-light mt-2 fs-3">{{ __('Listado de Juegos') }}</div>

                    <div class="card-body">

                        @if (Session('status'))
                            <div class="alert alert-success">
                                {{ Session('status') }}
                            </div>
                        @endif
                        <div class="mb-3 align-self-end">
                            <a href="{{ route('productos.create') }}" style="text-decoration: none; color:yellow; font-weight:bold;"> <img src="{{ asset('/img/mas.png') }}" alt="agregar" weight="20" height="40"> Agregar Juego </a>
                        </div>
                        <table class="table text-light align-middle">
                            <thead>
                                <tr>
                                    <th scope="col"> Nombre </th>
                                    <th scope="col"> Desarrollador </th>
                                    <th scope="col"> Año Lanzamiento </th>
                                    <th scope="col"> Género </th>
                                    <th scope="col"> Plataforma </th>
                                    <th scope="col"> Precio </th>
                                    <th scope="col"> Oferta </th>
                                    <th scope="col"> Estado </th>
                                    <th scope="col"> Editar </th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($productos->count() > 0)
                                    @foreach ($productos as $prod)
                                        <tr>
                                            <td> {{ $prod->nombre }} </td>
                                            <td class="text-center"> {{ $prod->desarrollador }} </td>
                                            <td class="text-center"> {{ $prod->lanzamiento }} </td>
                                            <td class="text-center"> {{ $prod->genero }} </td>
                                            <td class="text-center"> {{ $prod->categoria->nombre }} </td>
                                            <td class="text-center"> {{ $prod->precio_format() }} </td>
                                                @if($prod->en_oferta == 1)
                                                <td class="text-center">En Oferta</td>
                                                @else
                                                <td class="text-center">Precio base</td>
                                                @endif
                                                
                                                @if($prod->activo == 1)
                                                <td class="text-center">Activo</td>
                                                @else
                                                <td class="text-center">Inactivo</td>
                                                @endif
                                            
                                            <td class="text-center">
                                                <a  href="{{ route('productos.show', $prod) }}"> <img src="{{ asset('/img/editar.png') }}" alt="editar" weight="20" height="40">  </a>
                                            </td>
                                        </tr>
                                    @endforeach                           
                                @else
                                    <tr>
                                        <td class="text-center" colspan="4"> No existen productos cargados. </td>
                                    </tr>
                                @endif

                            </tbody>
                            
                        </table>

                        {{ $productos->links() }}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
