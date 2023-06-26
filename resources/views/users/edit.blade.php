@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card formulario text-light">
                    <div class="card-header mt-2 fs-3">{{ __('Modificación de usuario '. $user->name) }}</div>

                    <div class="card-body">

                        <form class="m-3" method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label"> Nombre de Usuario </label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre de usuario" value="{{ $user->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"> E-Mail </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el email del usuario" value="{{ $user->email }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label"> Contraseña </label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese la nueva contraseña del usuario" value="{{ $user->password }}">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="is_admin" class="form-label"> Tipo de Usuario </label>
                                
                                <select class="form-control" name="is_admin" id="is_admin">
                                    <option value="1" @if($user->is_admin == 1) selected @endif>Administrador</option>
                                    <option value="0" @if($user->is_admin == 0) selected @endif>Cliente</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success"> Modificar </button>
                            <a class="btn btn-danger" href="{{ route('users.index') }}"> Cancelar </a>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
