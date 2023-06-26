@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card formulario text-light">
                <div class="card-header mt-2 fs-3">{{ __('Usuarios') }}</div>

                <div class="card-body">
                    
                    @if (Session('status'))
                        <div class="alert alert-success">
                            {{ Session('status') }}
                        </div>
                    @endif

                    <table class="table text-light text-center align-middle">
                        <thead>
                            <tr>
                                <th scope="col"> ID </th>
                                <th scope="col"> Nombre </th>
                                <th scope="col"> E-Mail </th>
                                <th scope="col"> Tipo de Usuario </th>
                                <th scope="col"> Estado </th>
                                <th scope="col"> Fecha Creación </th>
                                <th scope="col"> Fecha Actualización </th>
                                <th scope="col"> Editar</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($users->count() > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td> {{ $user->id }} </td>
                                        <td> {{ $user->name }} </td>
                                        <td> {{ $user->email }} </td>
                                        @if($user->is_admin == 1)
                                        <td>Administrador</td>
                                        @else
                                        <td>Cliente</td>
                                        @endif
                                        @if($user->activo == 1)
                                        <td>Activo</td>
                                        @else
                                        <td>Inactivo</td>
                                        @endif
                                        <td> {{ $user->created_at }} </td>
                                        <td> {{ $user->updated_at }} </td>
                                        <td>
                                            <a href="{{ route('users.show', $user) }}"> <img src="{{ asset('/img/editar.png') }}" alt="editar" weight="20" height="40" > </a>
                                        </td>
                                    </tr>
                                @endforeach                           
                            @else
                                <tr>
                                    <td class="text-center" colspan="4"> No existen usuarios creados. </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection