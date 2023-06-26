@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card formulario text-light">
                <div class="card-header mt-2 fs-3">{{ __('Consolas') }}</div>

                <div class="card-body">
                    
                    @if (Session('status'))
                        <div class="alert alert-success">
                            {{ Session('status') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('categorias.create') }}" style="text-decoration: none; color:yellow; font-weight:bold;"> <img src="{{ asset('/img/mas.png') }}" alt="agregar" weight="20" height="40"> Agregar Consola</a>
                    </div>

                    <table class="table text-light align-middle">
                        <thead>
                            <tr>
                                <th scope="col"> Consola </th>
                                <th scope="col"> Descripción </th>
                                <th scope="col" class="text-center"> Fecha Creación </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($categorias->count() > 0)
                                @foreach ($categorias as $cat)
                                    <tr>
                                        <td> {{ $cat->nombre }} </td>
                                        <td> {{ $cat->descripcion }} </td>
                                        <td class="text-center"> {{ $cat->created_at }} </td>
                                    </tr>
                                @endforeach                           
                            @else
                                <tr>
                                    <td class="text-center" colspan="4"> No existen categorias creadas. </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection