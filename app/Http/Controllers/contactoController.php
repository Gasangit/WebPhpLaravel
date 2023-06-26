<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class contactoController extends Controller
{
    public function respuestaContacto(){

        $categorias = Categoria::all();

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('contacto.respuesta', ['categorias' => $categorias, 'juegosEnCarrito' => $juegosEnCarrito]);
    }
}
