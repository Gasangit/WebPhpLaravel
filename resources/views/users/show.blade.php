@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card formulario text-light">
                <div class="card-header mt-2 fs-3">{{ __('Datos de usuario '. $user->name) }}</div>

                <div class="card-body">
                    <p class="d-inline">Nombre de Usuario: </p> {{ $user->name }}
                    <br>
                    <p class="d-inline">E-Mail de Usuario: </p> {{ $user->email }}
                    <br>
                    <p class="d-inline">Tipo de Usuario: </p>  
                    @if($user->is_admin == 1)
                    <p class="d-inline">Administrador</p>
                    @else
                    <p class="d-inline">Cliente</p>
                    @endif
                    <hr>
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Volver a Usuarios </a>
                    <a class="btn btn-success" href="{{ route('users.edit', $user) }}"> Editar Usuario </a>
                    <form id="form-delete" class="d-inline" method="POST" action="{{ route('users.destroy', $user) }}">
                        @csrf
                        @method('DELETE')
                        <button id="form-submit" class="btn btn-danger" type="submit"> Inactivar Usuario </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection