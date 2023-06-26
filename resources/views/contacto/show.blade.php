@extends('layouts.app')

@section('content')

<!--Formulario de contacto-->
<div class="container" style="margin-bottom: 1em;">
    <div class="row flex justify-content-around">

        <div class="col-4">
            <h1 style="color:white;">¿Problemas con la compra?</h1>
            <h2 style="color:white; margin-left: 1em;">Envía un ticket a soporte</h2>
            <form action="{{ route('respuesta.contacto') }}" method="get">
            @csrf
            @method('GET')
                <div class="mb-3 mt-3" style="color:white;">
                    <label for="text" class="form-label">ID Pedido:</label>
                    <input type="text" class="form-control" id="idpedido" placeholder="Ingrese el ID de su Pedido"
                        name="idpedido">
                </div>
                <div class="mb-3 mt-3" style="color:white;">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Ingrese su E-mail" name="email">
                </div>
                <div class="mb-3" style="color:white;">
                    <label for="text" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="name" placeholder="Ingrese su nombre" name="name">
                </div>
                <div class="mt-3 ml-3" style="color:white;">
                    Mensaje:
                    <br>
                    <textarea class="form-control" id="comment" name="mensaje" rows="5" maxlength="500"
                        placeholder="Ingrese su consulta"></textarea>
                    <br>
                    <input type="submit" value="Enviar" class="btn btn-warning">
                    <input type="reset" value="Borrar" class="btn btn-danger">
                </div>
            </form>
        </div>

        <div class="col-6" style="border-left: thick solid white;border-width: 1px;">
            <h1 style="color:white; margin-left: 1em;">Escríbenos</h1>
            <p style="color:white; margin-left: 4em; margin-top: 2em; font-weight: bold;">Departamento de Ventas
                Empresas</p>
            <p style="color:white; margin-left: 4em;">¿Manejas una empresa? ¿Quieres vender juegos online en nuestra
                plataforma? Contáctanos en:</p>
            <p style="color:yellow; margin-left: 4em;">empresariales@lagproject.com</p>

            <p style="color:white; margin-left: 4em; margin-top: 2em; font-weight: bold;">Departamento de Talentos</p>
            <p style="color:white; margin-left: 4em;">¿Buscando un nuevo trabajo? Ponte en contacto con nuestro equipo
                de Talento en:</p>
            <p style="color:yellow; margin-left: 4em;">rrhh@lagproject.com</p>

            <p style="color:white; margin-left: 4em; margin-top: 2em; font-weight: bold;">Departamento de Legales</p>
            <p style="color:white; margin-left: 4em;">¿Tienes asuntos legales? Escríbenos a:</p>
            <p style="color:yellow; margin-left: 4em;">legales@lagproject.com</p>

            <p style="color:white; margin-left: 4em; margin-top: 2em; font-weight: bold;">Departamento de Soporte</p>
            <p style="color:white; margin-left: 4em;">Para mayor detalle sobre el soporte escríbenos a: </p>
            <p style="color:yellow; margin-left: 4em;">soporte@lagproject.com</p>
        </div>

    </div>
</div>

@endsection